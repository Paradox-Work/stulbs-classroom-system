<x-layout title="Student Dashboard">
    <style>
        /* STUDENT DASHBOARD - MODERN ORANGE THEME */
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
        }
        
        .dashboard-container {
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Header */
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .header-bg {
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
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .welcome-section p {
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }
        
        .user-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
        }
        
        .logout-btn {
            background: white;
            color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        /* Main Content */
        .dashboard-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Join Course Card */
        .join-card {
            background: var(--card);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .join-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary), var(--secondary));
        }
        
        .card-header {
            margin-bottom: 2rem;
        }
        
        .card-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .card-subtitle {
            color: var(--gray);
            margin: 0;
            font-size: 1rem;
        }
        
        .join-form {
            display: flex;
            gap: 1rem;
            align-items: flex-end;
        }
        
        .form-group {
            flex: 1;
            min-width: 250px;
        }
        
        .form-label {
            color: var(--dark);
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            color: var(--dark);
            transition: all 0.3s ease;
            background: var(--light-gray);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
            background: white;
        }
        
        .submit-btn {
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
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(249, 115, 22, 0.4);
        }
        
        /* Alert Messages */
        .alert {
            padding: 1.25rem;
            border-radius: 12px;
            margin-top: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--error);
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: var(--success);
        }
        
        /* Courses Section */
        .courses-section {
            background: var(--card);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }
        
        .section-header {
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        /* Courses Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .course-card {
            background: linear-gradient(135deg, #f9fafb 0%, #f5f7fa 100%);
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .course-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }
        
        .course-card:hover::before {
            transform: scaleX(1);
        }
        
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .course-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0;
        }
        
        .course-code {
            background: linear-gradient(135deg, var(--light), #fde68a);
            color: var(--dark);
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .course-info {
            margin: 1rem 0;
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        .course-info strong {
            color: var(--dark);
        }
        
        .course-footer {
            padding-top: 1rem;
            margin-top: 1rem;
            border-top: 1px solid #e5e7eb;
            color: var(--gray);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
        }
        
        .empty-title {
            font-size: 1.5rem;
            color: var(--dark);
            margin: 0 0 0.5rem 0;
        }
        
        .empty-subtitle {
            color: var(--gray);
            margin: 0;
            font-size: 1rem;
        }
        
        /* Stats Bar */
        .stats-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            flex: 1;
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
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
        
        .stat-content h3 {
            margin: 0;
            font-size: 0.9rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-content p {
            margin: 0.25rem 0 0;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
            
            .join-form {
                flex-direction: column;
                align-items: stretch;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-bar {
                flex-direction: column;
            }
        }
    </style>

    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <div class="header-bg"></div>
            <div class="header-content">
                <div class="welcome-section">
                    <h1>
                        <span>🎓</span>
                        Studentu Panelis
                    </h1>
                    <p>Sveiki atpakaļ, <strong>{{ auth()->user()->name }}</strong> 👋</p>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div class="user-badge">
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-weight: 600;">{{ auth()->user()->name }}</div>
                            <div style="font-size: 0.8rem; opacity: 0.8;">Students</div>
                        </div>
                    </div>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="logout-btn">
                        <span>🚪</span>
                        Iziet
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-main">
            <!-- Stats Bar -->
            @php 
                $subjects = auth()->user()->enrolledSubjects()->withCount(['students'])->get();
                $totalCourses = $subjects->count();
                $totalTeachers = $subjects->unique('teacher_id')->count();
            @endphp
            <div class="stats-bar">
                <div class="stat-card">
                    <div class="stat-icon">📚</div>
                    <div class="stat-content">
                        <h3>Aktīvie Kursi</h3>
                        <p>{{ $totalCourses }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-content">
                        <h3>Skolotāji</h3>
                        <p>{{ $totalTeachers }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📊</div>
                    <div class="stat-content">
                        <h3>Kopējais Progress</h3>
                        <p>0%</p>
                    </div>
                </div>
            </div>

            <!-- Join Course Card -->
            <div class="join-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span>✨</span>
                        Pievienojieties Kursam
                    </h2>
                    <p class="card-subtitle">Ievadiet kursa kodu, ko saņēmāt no skolotāja</p>
                </div>
                
                <form method="POST" action="{{ route('student.join') }}" class="join-form">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">
                            <span>🔑</span>
                            Kursa Kods
                        </label>
                        <input type="text" name="code" placeholder="PIEMĒRS" maxlength="6" class="form-input" required>
                    </div>
                    <button type="submit" class="submit-btn">
                        <span>✅</span>
                        Pievienojies
                    </button>
                </form>
                
                @if ($errors->has('code'))
                    <div class="alert alert-error">
                        <span>❌</span>
                        {{ $errors->first('code') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <span>✅</span>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- My Courses Section -->
            <div class="courses-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <span>📖</span>
                        Mani Kursi
                    </h2>
                    <p class="card-subtitle">Visi kursi, kuros jūs esat reģistrējies</p>
                </div>
                
                @if($subjects->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">📚</div>
                        <h3 class="empty-title">Vēl nav kursu</h3>
                        <p class="empty-subtitle">Pievienojieties kursam, izmantojot kodu, vai lūdziet skolotājam kodu</p>
                    </div>
                @else
                    <div class="courses-grid">
                        @foreach($subjects as $subject)
                            <a href="{{ route('student.course.show', $subject->id) }}" class="course-card">
                                <div class="course-header">
                                    <h3 class="course-title">{{ $subject->name }}</h3>
                                    <span class="course-code">{{ $subject->code }}</span>
                                </div>
                                <div class="course-info">
                                    <p><strong>👨‍🏫 Skolotājs:</strong> {{ optional($subject->teacher)->name ?? '—' }}</p>
                                </div>
                                <div class="course-footer">
                                    <span>👥 {{ $subject->students_count }} studenti</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Auto-uppercase course code input
        document.querySelector('input[name="code"]').addEventListener('input', function(e) {
            this.value = this.value.toUpperCase();
        });
        
        // Add hover effect to course cards
        document.querySelectorAll('.course-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</x-layout>