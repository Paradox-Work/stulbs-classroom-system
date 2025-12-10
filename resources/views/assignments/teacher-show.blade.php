<x-layout :title="'Uzdevums: ' . $assignment->title . ' (Skolotājs)'">
    <style>
        /* ORANGE THEME TEACHER ASSIGNMENT VIEW */
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
            --light: #fed7aa;
            --dark: #7c2d12;
            --bg: #fff7ed;
            --card: white;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --info: #3b82f6;
        }
        
        .teacher-assignment-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Hero Header */
        .teacher-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        
        .teacher-hero-bg {
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(254, 215, 170, 0.15);
            border-radius: 50%;
            top: -200px;
            right: -150px;
            animation: pulse 20s infinite;
        }
        
        .teacher-hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .teacher-hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 1rem 0;
            line-height: 1.1;
        }
        
        .teacher-hero-subtitle {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Main Content */
        .teacher-main {
            max-width: 1200px;
            margin: -2rem auto 0;
            padding: 0 2rem 4rem;
            position: relative;
            z-index: 2;
        }
        
        /* Description Card */
        .teacher-description-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        }
        
        .teacher-card-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 1.5rem 0;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .description-content {
            color: #374151;
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        /* Resources Card */
        .teacher-resources-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(249, 115, 22, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .teacher-resources-bg {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -150px;
            right: -150px;
        }
        
        /* Upload Form */
        .upload-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Students Card */
        .students-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        }
        
        /* Student Item */
        .student-item {
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .student-item:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .student-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .student-info h4 {
            margin: 0 0 0.25rem 0;
            color: var(--dark);
            font-size: 1.1rem;
            font-weight: 700;
        }
        
        .student-email {
            color: #6b7280;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .grade-badge {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .grade-graded {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }
        
        .grade-pending {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }
        
        /* Submissions Section */
        .submissions-section {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            border-left: 4px solid var(--primary);
        }
        
        .submission-item {
            padding: 1rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .submission-item:last-child {
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
            padding: 1rem;
            border-radius: 8px;
            margin-top: 0.75rem;
            border-left: 3px solid var(--info);
            font-size: 0.9rem;
            color: #0369a1;
        }
        
        /* Grade Form */
        .grade-form {
            display: flex;
            gap: 1rem;
            align-items: flex-end;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .form-group-small {
            flex: 1;
            min-width: 150px;
        }
        
        .form-input-small {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input-small:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }
        
        .grade-btn {
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .grade-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Back Button */
        .teacher-back-btn {
            background: white;
            color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .teacher-back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Empty States */
        .teacher-empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #9ca3af;
        }
        
        .teacher-empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .teacher-hero {
                padding: 2rem 1rem;
                clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            }
            
            .teacher-hero-content {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .teacher-hero-title {
                font-size: 2rem;
            }
            
            .teacher-main {
                padding: 0 1rem 2rem;
                margin-top: -1rem;
            }
            
            .teacher-description-card,
            .teacher-resources-card,
            .students-card {
                padding: 1.5rem;
            }
            
            .student-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .grade-form {
                flex-direction: column;
            }
            
            .form-group-small {
                width: 100%;
            }
        }
    </style>

    <div class="teacher-assignment-container">
        <!-- Hero Header -->
        <div class="teacher-hero">
            <div class="teacher-hero-bg"></div>
            <div class="teacher-hero-content">
                <div>
                    <h1 class="teacher-hero-title">👨‍🏫 {{ $assignment->title }}</h1>
                    <div class="teacher-hero-subtitle">
                        <span class="hero-badge">📚 {{ optional($subject)->name }}</span>
                        <span class="hero-badge">📅 {{ optional($assignment->due_date)->format('d.m.Y') }}</span>
                        <span class="hero-badge">👥 {{ $students->count() }} studenti</span>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="teacher-back-btn">
                    ← Atpakaļ
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="teacher-main">
            <!-- Description Section -->
            <div class="teacher-description-card">
                <h2 class="teacher-card-title">📖 Uzdevuma Apraksts</h2>
                <div class="description-content">
                    {!! nl2br(e($assignment->description)) !!}
                </div>
            </div>

            <!-- Teacher Resources Section -->
            <div class="teacher-resources-card">
                <div class="teacher-resources-bg"></div>
                <h2 class="teacher-card-title" style="color: white; border-bottom-color: rgba(255,255,255,0.3);">
                    📚 Materiāli Studentiem
                </h2>
                
                @php $teacherFiles = $files->where('user_id', auth()->id()); @endphp
                
                @if($teacherFiles->isEmpty())
                    <p style="margin: 0 0 1.5rem; opacity: 0.95; position: relative; z-index: 2;">
                        📭 Vēl nav augšuplādēti materiāli.
                    </p>
                @else
                    <div style="position: relative; z-index: 2;">
                        @foreach($teacherFiles as $f)
                            <div style="background: rgba(255, 255, 255, 0.1); border-radius: 12px; padding: 1rem; margin-bottom: 0.75rem; backdrop-filter: blur(10px);">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <a href="{{ route('file.download', $f->id) }}" 
                                       style="color: white; text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;"
                                       onmouseover="this.style.transform='translateX(4px)';"
                                       onmouseout="this.style.transform='translateX(0)';">
                                        📥 {{ $f->original_name }}
                                    </a>
                                    <span style="opacity: 0.8; font-size: 0.9rem; background: rgba(255, 255, 255, 0.2); padding: 0.25rem 0.75rem; border-radius: 6px;">
                                        {{ round($f->size/1024, 1) }} KB
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Upload Form -->
                <form method="POST" action="{{ route('assignment.upload', $assignment->id) }}" enctype="multipart/form-data" class="upload-form">
                    @csrf
                    <div style="display: flex; gap: 1rem; align-items: flex-end; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 200px;">
                            <label style="color: white; display: block; margin-bottom: 0.5rem; font-weight: 600;">📁 Jauns Materiāls</label>
                            <input type="file" name="file" required 
                                   style="background: white; color: #1B262C; border: none; padding: 0.75rem; border-radius: 8px; width: 100%; cursor: pointer; font-weight: 600;">
                        </div>
                        <button type="submit" 
                                style="background: white; color: var(--primary); padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 700; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            📤 Augšuplādēt
                        </button>
                    </div>
                </form>
            </div>

            <!-- Student Submissions Section -->
            <div class="students-card">
                <h2 class="teacher-card-title">📋 Studentu Iesniegumi & Vērtējumi</h2>

                @if($students->isEmpty())
                    <div class="teacher-empty-state">
                        <div class="teacher-empty-icon">👥</div>
                        <h3 style="color: #6b7280; margin: 0 0 0.5rem 0;">
                            Kursā vēl nav studentu
                        </h3>
                        <p style="margin: 0;">Dalies ar kursa kodu studentiem, lai viņi varētu pievienoties.</p>
                    </div>
                @else
                    <div>
                        @foreach($students as $student)
                            @php 
                                $submissions = $files->where('user_id', $student->id); 
                                $grade = $student->grades->first(); 
                            @endphp
                            
                            <div class="student-item">
                                <div class="student-header">
                                    <div class="student-info">
                                        <h4>👤 {{ $student->name }}</h4>
                                        <div class="student-email">
                                            ✉️ {{ $student->email }}
                                        </div>
                                    </div>
                                    <div>
                                        @if($grade)
                                            <span class="grade-badge grade-graded">
                                                ✓ Vērtējums: {{ $grade->grade }}/100
                                            </span>
                                        @else
                                            <span class="grade-badge grade-pending">
                                                ⏳ Nav Vērtēts
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if($submissions->isEmpty())
                                    <p style="margin: 0; color: #9ca3af; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                                        📭 Vēl nav iesnieguši darbu
                                    </p>
                                @else
                                    <div class="submissions-section">
                                        <p style="margin: 0 0 0.75rem; color: var(--dark); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                                            📋 Iesniegumi:
                                        </p>
                                        @foreach($submissions as $sub)
                                            <div class="submission-item">
                                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                                    <a href="{{ route('file.download', $sub->id) }}" class="file-link">
                                                        📥 {{ $sub->original_name }}
                                                    </a>
                                                    <span style="color: #6b7280; font-size: 0.85rem;">
                                                        ⏰ {{ $sub->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                @if($sub->note)
                                                    <div class="note-box">
                                                        <strong>💬 Piezīme:</strong> {{ $sub->note }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Grade Form -->
                                @if($submissions->isNotEmpty())
                                    <form method="POST" action="{{ route('teacher.gradeAssignment', $assignment->id) }}" class="grade-form">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                        <div class="form-group-small">
                                            <label style="display: block; margin-bottom: 0.25rem; font-weight: 600; color: var(--dark); font-size: 0.9rem;">Vērtējums (0-100)</label>
                                            <input type="number" name="grade" min="0" max="100" 
                                                   value="{{ $grade->grade ?? '' }}"
                                                   class="form-input-small" 
                                                   placeholder="Ievadiet vērtējumu">
                                        </div>
                                        <div class="form-group-small">
                                            <label style="display: block; margin-bottom: 0.25rem; font-weight: 600; color: var(--dark); font-size: 0.9rem;">Atsauksmes</label>
                                            <input type="text" name="feedback" 
                                                   value="{{ $grade->feedback ?? '' }}"
                                                   class="form-input-small" 
                                                   placeholder="Rakstiet atsauksmes">
                                        </div>
                                        <button type="submit" class="grade-btn">
                                            📊 Saglabāt
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>