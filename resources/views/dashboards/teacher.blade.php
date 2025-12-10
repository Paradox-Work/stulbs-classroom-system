<x-layout title="Teacher Dashboard">
    <style>
        /* TEACHER DASHBOARD - MODERN ORANGE THEME */
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
            --light: #fed7aa;
            --dark: #7c2d12;
            --bg: #fff7ed;
            --card: white;
            --success: #10b981;
            --error: #ef4444;
            --gray: #6b7280;
            --light-gray: #f9fafb;
            --warning: #f59e0b;
            --info: #3b82f6;
        }
        
        .teacher-container {
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Header */
        .teacher-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .teacher-bg {
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(254, 215, 170, 0.2);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: rotate 40s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .teacher-header-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .teacher-welcome h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .teacher-welcome p {
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }
        
        /* Navigation Tabs */
        .teacher-tabs {
            background: white;
            border-bottom: 2px solid #e5e7eb;
            padding: 0 2rem;
        }
        
        .tab-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }
        
        .tab {
            padding: 1rem 1.5rem;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray);
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        
        .tab:hover {
            color: var(--primary);
        }
        
        .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }
        
        /* Main Content */
        .teacher-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Stats Bar */
        .teacher-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .teacher-stat {
            background: var(--card);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        
        .teacher-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .teacher-stat-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .teacher-stat-content h3 {
            margin: 0;
            font-size: 0.9rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .teacher-stat-content p {
            margin: 0.25rem 0 0;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
        }
        
        /* Course Management Card */
        .course-manage-card {
            background: var(--card);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .card-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 1.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        /* Current Course */
        .current-course {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 6px solid var(--primary);
        }
        
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .course-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0;
        }
        
        .course-code-box {
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .course-code {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 2px;
        }
        
        .regenerate-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .regenerate-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Create Course Form */
        .create-course-form {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            border: 2px dashed #e5e7eb;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(249, 115, 22, 0.4);
        }
        
        .btn-secondary {
            background: white;
            color: var(--primary);
            padding: 1rem 2rem;
            border-radius: 12px;
            border: 2px solid var(--primary);
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: rgba(249, 115, 22, 0.1);
        }
        
        /* Assignments Section */
        .assignments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .assignment-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .assignment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            border-color: var(--primary);
        }
        
        .assignment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .assignment-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0;
        }
        
        .assignment-status {
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-graded {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-submissions {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .assignment-meta {
            color: var(--gray);
            font-size: 0.9rem;
            margin: 0.5rem 0;
        }
        
        .assignment-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .action-view {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .action-grade {
            background: #d1fae5;
            color: #065f46;
        }
        
        .action-delete {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Submissions Grid - NEW */
        .submissions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .submission-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .submission-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-color: var(--primary);
        }
        
        .submission-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .submission-student {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .submission-time {
            font-size: 0.8rem;
            color: var(--gray);
            background: var(--light-gray);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }
        
        .submission-assignment {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .submission-files {
            background: #f9fafb;
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem 0;
        }
        
        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .file-item:last-child {
            border-bottom: none;
        }
        
        .file-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }
        
        .file-link:hover {
            color: var(--primary-dark);
        }
        
        .note-box {
            background: #f0f9ff;
            padding: 0.75rem;
            border-radius: 8px;
            margin-top: 0.75rem;
            font-size: 0.9rem;
            color: #0369a1;
            border-left: 3px solid var(--info);
        }
        
        .grade-form {
            display: flex;
            gap: 0.75rem;
            align-items: flex-end;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .grade-input {
            flex: 1;
            padding: 0.5rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .grade-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }
        
        .grade-btn {
            background: var(--primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .grade-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .grade-display {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--success);
            background: rgba(16, 185, 129, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Students List */
        .students-list {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        
        .students-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .students-table th {
            background: #f9fafb;
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            color: var(--dark);
            border-bottom: 2px solid #e5e7eb;
        }
        
        .students-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .student-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }
        
        /* Alert Messages */
        .alert {
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideIn 0.3s ease;
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: var(--success);
        }
        
        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--error);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #9ca3af;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .teacher-header-content {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
            
            .tab-container {
                overflow-x: auto;
                padding-bottom: 1rem;
            }
            
            .teacher-stats {
                grid-template-columns: 1fr;
            }
            
            .assignments-grid,
            .submissions-grid {
                grid-template-columns: 1fr;
            }
            
            .students-table {
                display: block;
                overflow-x: auto;
            }
            
            .grade-form {
                flex-direction: column;
            }
            
            .grade-input {
                width: 100%;
            }
        }
    </style>

    <div class="teacher-container">
        <!-- Header -->
        <div class="teacher-header">
            <div class="teacher-bg"></div>
            <div class="teacher-header-content">
                <div class="teacher-welcome">
                    <h1>
                        <span>👨‍🏫</span>
                        Skolotāja Panelis
                    </h1>
                    <p>Sveiki, <strong>{{ auth()->user()->name }}</strong> — vadiet savus kursus un studentus 👋</p>
                </div>
                <div>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="logout-btn" style="background: white; color: var(--primary); padding: 0.75rem 1.5rem; border-radius: 12px; text-decoration: none; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; cursor: pointer; border: none;">
                        <span>🚪</span>
                        Iziet
                    </button>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="teacher-tabs">
            <div class="tab-container">
                <button class="tab active" onclick="switchTab('overview')">📊 Pārskats</button>
                <button class="tab" onclick="switchTab('courses')">📖 Kursi</button>
                <button class="tab" onclick="switchTab('assignments')">✏️ Uzdevumi</button>
                <button class="tab" onclick="switchTab('submissions')">📤 Iesniegumi</button>
                <button class="tab" onclick="switchTab('students')">👥 Studenti</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="teacher-main">
            <!-- Alerts -->
            @if (session('success'))
                <div class="alert alert-success">
                    <span>✅</span>
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-error">
                    <span>❌</span>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <!-- Overview Tab (Default) -->
            <div id="overview-tab" class="tab-content">
                <!-- Stats Bar -->
  @php
    $teacherSubjects = $subjects ?? collect();
    $totalStudents = $teacherSubjects->isNotEmpty() 
        ? $teacherSubjects->flatMap->students->unique('id')->count() 
        : 0;
    $totalAssignments = $teacherSubjects->isNotEmpty()
        ? \App\Models\Assignment::whereIn('subject_id', $teacherSubjects->pluck('id'))->count()
        : 0;
    
    // More efficient calculation
    $pendingSubmissions = 0;
    if ($teacherSubjects->isNotEmpty()) {
        $teacherId = auth()->id();
        $assignmentIds = \App\Models\Assignment::whereIn('subject_id', $teacherSubjects->pluck('id'))->pluck('id');
        
        if ($assignmentIds->isNotEmpty()) {
            // Get all submissions for teacher's assignments
            $allSubmissions = \App\Models\AssignmentFile::whereIn('assignment_id', $assignmentIds)
                ->where('user_id', '!=', $teacherId)
                ->select('assignment_id', 'user_id')
                ->distinct()
                ->get();
            
            // Get all grades for teacher's assignments
            $allGrades = \App\Models\Grade::whereIn('assignment_id', $assignmentIds)
                ->select('assignment_id', 'student_id')
                ->distinct()
                ->get();
            
            // Create a lookup for grades
            $gradedLookup = [];
            foreach ($allGrades as $grade) {
                $gradedLookup[$grade->assignment_id . '_' . $grade->student_id] = true;
            }
            
            // Count submissions without grades
            foreach ($allSubmissions as $submission) {
                $key = $submission->assignment_id . '_' . $submission->user_id;
                if (!isset($gradedLookup[$key])) {
                    $pendingSubmissions++;
                }
            }
        }
    }
@endphp
                <div class="teacher-stats">
                    <div class="teacher-stat">
                        <div class="teacher-stat-icon">📖</div>
                        <div class="teacher-stat-content">
                            <h3>Mani Kursi</h3>
                            <p>{{ $teacherSubjects->count() }}</p>
                        </div>
                    </div>
                    <div class="teacher-stat">
                        <div class="teacher-stat-icon">👥</div>
                        <div class="teacher-stat-content">
                            <h3>Kopējie Studenti</h3>
                            <p>{{ $totalStudents }}</p>
                        </div>
                    </div>
                    <div class="teacher-stat">
                        <div class="teacher-stat-icon">✏️</div>
                        <div class="teacher-stat-content">
                            <h3>Uzdevumi</h3>
                            <p>{{ $totalAssignments }}</p>
                        </div>
                    </div>
                    <div class="teacher-stat">
                        <div class="teacher-stat-icon">⏳</div>
                        <div class="teacher-stat-content">
                            <h3>Gaida Vērtējumu</h3>
                            <p>{{ $pendingSubmissions }}</p>
                        </div>
                    </div>
                </div>

                <!-- Current Course -->
                <div class="course-manage-card">
                    <h2 class="card-title">
                        <span>🎯</span>
                        Aktīvais Kurss
                    </h2>
                    
                    @if($teacherSubjects->isNotEmpty())
                        @php $currentSubject = $teacherSubjects->first(); @endphp
                        <div class="current-course">
                            <div class="course-header">
                                <div>
                                    <h3 class="course-title">{{ $currentSubject->name }}</h3>
                                    <p style="margin: 0.5rem 0 0; color: var(--gray);">Kursa kods studentu reģistrēšanai</p>
                                </div>
                                <div class="course-code-box">
                                    <div>
                                        <div style="font-size: 0.9rem; color: var(--gray);">Kods:</div>
                                        <div class="course-code">{{ $currentSubject->code }}</div>
                                    </div>
                                    <form method="POST" action="{{ route('teacher.regenerateCode') }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="subject_id" value="{{ $currentSubject->id }}">
                                        <button type="submit" class="regenerate-btn" onclick="return confirm('Vai tiešām vēlaties ģenerēt jaunu kodu? Vecais kods vairs nedarbosies!')">
                                            🔄
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                                <div>
                                    <div style="font-size: 0.9rem; color: var(--gray);">Studenti:</div>
                                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--dark);">{{ $currentSubject->students->count() }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 0.9rem; color: var(--gray);">Uzdevumi:</div>
                                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--dark);">{{ $currentSubject->assignments->count() }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 0.9rem; color: var(--gray);">Izveidots:</div>
                                    <div style="font-size: 1rem; font-weight: 600; color: var(--dark);">{{ $currentSubject->created_at->format('d.m.Y') }}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="text-align: center; padding: 3rem 2rem; background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 16px;">
                            <div style="font-size: 4rem; margin-bottom: 1rem;">📚</div>
                            <h3 style="margin: 0 0 0.5rem; color: var(--dark);">Vēl nav izveidots kurss</h3>
                            <p style="margin: 0; color: var(--gray);">Izveidojiet savu pirmo kursu, lai sāktu strādāt</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Courses Tab -->
            <div id="courses-tab" class="tab-content" style="display: none;">
                <div class="course-manage-card">
                    <h2 class="card-title">
                        <span>📖</span>
                        Kursu Pārvaldība
                    </h2>
                    
                    <!-- Create Course Form -->
                    <form method="POST" action="{{ route('teacher.setSubject') }}" class="create-course-form">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Kursa Nosaukums</label>
                            <input type="text" name="name" class="form-input" placeholder="Piemēram: Matemātika 10. klase" required>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <span>✨</span>
                                Izveidot Kursu
                            </button>
                        </div>
                    </form>
                    
                    <!-- Existing Courses -->
                    @if($teacherSubjects->isNotEmpty())
                        <div style="margin-top: 3rem;">
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--dark); margin-bottom: 1.5rem;">Mani Kursi</h3>
                            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                                @foreach($teacherSubjects as $subject)
                                    <div class="assignment-card">
                                        <h4 style="margin: 0 0 0.5rem; color: var(--dark); font-size: 1.1rem; font-weight: 700;">{{ $subject->name }}</h4>
                                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                                            <span style="background: rgba(249, 115, 22, 0.1); color: var(--primary); padding: 0.25rem 0.75rem; border-radius: 6px; font-weight: 700; font-size: 0.9rem; letter-spacing: 1px;">{{ $subject->code }}</span>
                                            <span style="color: var(--gray); font-size: 0.9rem;">{{ $subject->students->count() }} studenti</span>
                                        </div>
                                        <div style="font-size: 0.9rem; color: var(--gray);">
                                            Izveidots: {{ $subject->created_at->format('d.m.Y') }}
                                        </div>
                                        <div class="assignment-actions">
                                            <a href="{{ route('student.course.show', $subject->id) }}" class="action-btn action-view">
                                                👁️ Apskatīt
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Assignments Tab -->
            <div id="assignments-tab" class="tab-content" style="display: none;">
                <div class="course-manage-card">
                    <h2 class="card-title">
                        <span>✏️</span>
                        Uzdevumu Pārvaldība
                    </h2>
                    
                    <!-- Create Assignment Form -->
                    <form method="POST" action="{{ route('teacher.storeAssignment') }}" class="create-course-form" style="margin-bottom: 2rem;">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Uzdevuma Nosaukums</label>
                            <input type="text" name="title" class="form-input" placeholder="Piemēram: Algebras testa darbs" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Apraksts</label>
                            <textarea name="description" class="form-input" rows="3" placeholder="Detalizēts uzdevuma apraksts..." required></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="form-label">Termiņš</label>
                                <input type="date" name="due_date" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kurss</label>
                            <select name="subject_id" class="form-input" required>
                                <option value="">Izvēlieties kursu</option>
                                @foreach($teacherSubjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <span>➕</span>
                                Pievienot Uzdevumu
                            </button>
                        </div>
                    </form>
                    
                    <!-- Existing Assignments -->
                    @php
                        $teacherAssignments = \App\Models\Assignment::whereIn('subject_id', $teacherSubjects->pluck('id'))
                            ->with(['subject', 'files', 'grades'])
                            ->latest()
                            ->get();
                    @endphp
                    @if($teacherAssignments->isNotEmpty())
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--dark); margin-bottom: 1.5rem;">Mani Uzdevumi</h3>
                        <div class="assignments-grid">
                            @foreach($teacherAssignments as $assignment)
                                @php
                                    $submissionCount = $assignment->files->where('user_id', '!=', $assignment->teacher_id)->count();
                                    $gradedCount = $assignment->grades->count();
                                @endphp
                                <div class="assignment-card">
                                    <div class="assignment-header">
                                        <h4 class="assignment-title">{{ $assignment->title }}</h4>
                                        @if($submissionCount > 0)
                                            <span class="assignment-status status-submissions">
                                                📤 {{ $submissionCount }}
                                            </span>
                                        @else
                                            <span class="assignment-status status-pending">⏳ Gaida</span>
                                        @endif
                                    </div>
                                    <div class="assignment-meta">
                                        <div><strong>Kurss:</strong> {{ $assignment->subject->name }}</div>
                                        <div><strong>Termiņš:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('d.m.Y') }}</div>
                                        <div><strong>Iesniegumi:</strong> {{ $submissionCount }} / {{ $assignment->subject->students->count() }}</div>
                                        <div><strong>Vērtēti:</strong> {{ $gradedCount }} / {{ $submissionCount }}</div>
                                    </div>
                                    <p style="margin: 1rem 0; color: var(--gray); font-size: 0.9rem;">{{ Str::limit($assignment->description, 100) }}</p>
                                    <div class="assignment-actions">
                                        <a href="{{ route('assignment.show', $assignment->id) }}" class="action-btn action-view">
                                            👁️ Apskatīt
                                        </a>
                                        @if($submissionCount > 0)
                                            <a href="{{ route('assignment.show', $assignment->id) }}" class="action-btn action-grade">
                                                📊 Vērtēt ({{ $submissionCount - $gradedCount }})
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('teacher.destroyAssignment', $assignment) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn action-delete" onclick="return confirm('Vai tiešām vēlaties dzēst šo uzdevumu?')">
                                                🗑️ Dzēst
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Submissions Tab - NEW -->
            <div id="submissions-tab" class="tab-content" style="display: none;">
                <div class="course-manage-card">
                    <h2 class="card-title">
                        <span>📤</span>
                        Studentu Iesniegumi
                    </h2>
                    
                   @php
    // Get all submissions for teacher's assignments
    $teacherAssignmentIds = \App\Models\Assignment::whereIn('subject_id', $teacherSubjects->pluck('id'))->pluck('id');
    
    if ($teacherAssignmentIds->isNotEmpty()) {
        $submissions = \App\Models\AssignmentFile::whereIn('assignment_id', $teacherAssignmentIds)
            ->where('user_id', '!=', auth()->id()) // Exclude teacher's own files
            ->with(['assignment', 'user', 'assignment.grades'])
            ->latest()
            ->get()
            ->groupBy('assignment_id');
    } else {
        $submissions = collect();
    }
@endphp
                    
                    @if($submissions->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">📭</div>
                            <h3 style="color: #6b7280; margin: 0 0 0.5rem 0;">
                                Vēl nav iesniegumu
                            </h3>
                            <p style="margin: 0;">Studentiem vēl nav iesniegti darbi jūsu uzdevumiem.</p>
                        </div>
                    @else
                        <div class="submissions-grid">
                            @foreach($submissions as $assignmentId => $assignmentSubmissions)
                                @php $assignment = $assignmentSubmissions->first()->assignment; @endphp
                                @foreach($assignmentSubmissions as $submission)
                                    <div class="submission-card">
                                        <div class="submission-header">
                                            <h3 class="submission-student">
                                                👤 {{ $submission->user->name }}
                                            </h3>
                                            <span class="submission-time">
                                                {{ $submission->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        
                                        <div class="submission-assignment">
                                            📝 {{ $assignment->title }}
                                        </div>
                                        
                                        @if($submission->path)
                                            <div class="submission-files">
                                                <div class="file-item">
                                                    <a href="{{ route('file.download', $submission->id) }}" class="file-link">
                                                        📎 {{ $submission->original_name }}
                                                    </a>
                                                    <span style="color: var(--gray); font-size: 0.8rem;">
                                                        {{ round($submission->size/1024, 1) }} KB
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($submission->note)
                                            <div class="note-box">
                                                <strong>💬 Piezīme:</strong> {{ $submission->note }}
                                            </div>
                                        @endif
                                        
                                        @php
    // Get grade for this student on this assignment
    $studentGrade = $submission->assignment->grades
        ->where('student_id', $submission->user_id)
        ->first();
@endphp

@if($studentGrade)
    <div style="margin-top: 1rem;">
        <div class="grade-display">
            ✅ {{ $studentGrade->grade }}/100
        </div>
        @if($studentGrade->feedback)
            <div style="margin-top: 0.5rem; color: var(--gray); font-size: 0.9rem;">
                <strong>Atsauksmes:</strong> {{ $studentGrade->feedback }}
            </div>
        @endif
    </div>
@else
                                            <form method="POST" action="{{ route('teacher.gradeAssignment', $assignment->id) }}" class="grade-form">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $submission->user_id }}">
                                                <input type="number" name="grade" min="0" max="100" 
                                                       class="grade-input" 
                                                       placeholder="Vērtējums (0-100)" required>
                                                <input type="text" name="feedback" 
                                                       class="grade-input" 
                                                       placeholder="Atsauksmes (nav obligāti)">
                                                <button type="submit" class="grade-btn">
                                                    📊 Vērtēt
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Students Tab -->
            <div id="students-tab" class="tab-content" style="display: none;">
                <div class="course-manage-card">
                    <h2 class="card-title">
                        <span>👥</span>
                        Studentu Saraksts
                    </h2>
                    
                    @if($teacherSubjects->isNotEmpty())
                        <div class="students-list">
                            <table class="students-table">
                                <thead>
                                    <tr>
                                        <th>Students</th>
                                        <th>E-pasts</th>
                                        <th>Kurss</th>
                                        <th>Iesniegtie</th>
                                        <th>Vidējā atzīme</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacherSubjects as $subject)
                                        @foreach($subject->students as $student)
                                            @php
                                                $studentAssignments = $subject->assignments;
                                                $submittedCount = \App\Models\AssignmentFile::whereIn('assignment_id', $studentAssignments->pluck('id'))
                                                    ->where('user_id', $student->id)
                                                    ->count();
                                                $grades = \App\Models\Grade::whereIn('assignment_id', $studentAssignments->pluck('id'))
                                                    ->where('student_id', $student->id)
                                                    ->get();
                                                $averageGrade = $grades->isNotEmpty() ? $grades->avg('grade') : null;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                        <div class="student-avatar">
                                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                                        </div>
                                                        <div>
                                                            <div style="font-weight: 600;">{{ $student->name }}</div>
                                                            <div style="font-size: 0.85rem; color: var(--gray);">ID: {{ $student->id }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>
                                                    @if($submittedCount > 0)
                                                        <span style="background: var(--success); color: white; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">
                                                            {{ $submittedCount }}/{{ $studentAssignments->count() }}
                                                        </span>
                                                    @else
                                                        <span style="color: var(--gray);">0/{{ $studentAssignments->count() }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($averageGrade)
                                                        <span style="font-weight: 700; color: var(--success);">
                                                            {{ number_format($averageGrade, 1) }}
                                                        </span>
                                                    @else
                                                        <span style="color: var(--gray);">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">👥</div>
                            <h3 style="color: #6b7280; margin: 0 0 0.5rem 0;">
                                Vēl nav studentu
                            </h3>
                            <p style="margin: 0;">Izveidojiet kursu un dalieties ar kodu studentiem</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.style.display = 'none';
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').style.display = 'block';
            
            // Update active tab button
            document.querySelectorAll('.tab').forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Save active tab to localStorage
            localStorage.setItem('activeTeacherTab', tabName);
        }

        // Initialize with saved tab or overview
        document.addEventListener('DOMContentLoaded', function() {
            const savedTab = localStorage.getItem('activeTeacherTab') || 'overview';
            switchTab(savedTab);
            
            // Update tab buttons
            document.querySelectorAll('.tab').forEach(button => {
                button.classList.remove('active');
                if (button.textContent.includes(savedTab === 'overview' ? 'Pārskats' : 
                                                savedTab === 'courses' ? 'Kursi' :
                                                savedTab === 'assignments' ? 'Uzdevumi' :
                                                savedTab === 'submissions' ? 'Iesniegumi' : 'Studenti')) {
                    button.classList.add('active');
                }
            });
        });

        // Auto-refresh submissions tab every 30 seconds
        setInterval(() => {
            const activeTab = localStorage.getItem('activeTeacherTab');
            if (activeTab === 'submissions') {
                // You could implement AJAX refresh here
                console.log('Auto-refreshing submissions...');
            }
        }, 30000);
    </script>
</x-layout>