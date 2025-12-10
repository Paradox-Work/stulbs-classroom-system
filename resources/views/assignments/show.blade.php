<x-layout :title="'Uzdevums: ' . $assignment->title">
    <style>
        /* ORANGE THEME ASSIGNMENT PAGE */
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
            --warning: #f59e0b;
        }
        
        .assignment-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Hero Header */
        .assignment-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        
        .assignment-hero-bg {
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(254, 215, 170, 0.15);
            border-radius: 50%;
            top: -200px;
            right: -150px;
            animation: pulse 20s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.15; }
            50% { transform: scale(1.05); opacity: 0.2; }
        }
        
        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 1rem 0;
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .hero-subtitle span {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: -2rem auto 0;
            padding: 0 2rem 4rem;
            position: relative;
            z-index: 2;
        }
        
        /* Description Card */
        .description-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .card-title {
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
        
        .description-text {
            color: #374151;
            line-height: 1.8;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .deadline-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 1.25rem;
            border-radius: 12px;
            border-left: 4px solid var(--warning);
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        /* Resources Card */
        .resources-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(249, 115, 22, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .resources-bg {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -150px;
            right: -150px;
        }
        
        /* Submissions Card */
        .submissions-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        }
        
        .file-item {
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }
        
        .file-item:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .file-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        
        .file-name {
            color: var(--dark);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .file-name:hover {
            color: var(--primary);
        }
        
        .file-meta {
            display: flex;
            gap: 1rem;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .file-note {
            background: #f0f9ff;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 3px solid #0ea5e9;
        }
        
        /* Upload Form */
        .upload-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            border: 2px dashed var(--primary);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
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
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
        }
        
        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(249, 115, 22, 0.4);
        }
        
        /* Back Button */
        .back-btn {
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
        
        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Alerts */
        .alert {
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 600;
            animation: slideIn 0.3s ease;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid #059669;
        }
        
        .alert-error {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid #dc2626;
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
            .assignment-hero {
                padding: 2rem 1rem;
                clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            }
            
            .hero-content {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .main-content {
                padding: 0 1rem 2rem;
                margin-top: -1rem;
            }
            
            .description-card,
            .resources-card,
            .submissions-card,
            .upload-card {
                padding: 1.5rem;
            }
        }
    </style>

    <div class="assignment-container">
        <!-- Hero Header -->
        <div class="assignment-hero">
            <div class="assignment-hero-bg"></div>
            <div class="hero-content">
                <div>
                    <h1 class="hero-title">✏️ {{ $assignment->title }}</h1>
                    <div class="hero-subtitle">
                        <span>📚 {{ optional($assignment->subject)->name }}</span>
                        <span>👨‍🏫 {{ optional($assignment->teacher)->name }}</span>
                        @if(optional($assignment->due_date)?->isPast())
                            <span style="background: rgba(239, 68, 68, 0.3);">⏰ Pārraidīts</span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('student.course.show', $assignment->subject_id) }}" class="back-btn">
                    ← Atpakaļ
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Description Section -->
            <div class="description-card">
                <h2 class="card-title">📖 Apraksts & Norādījumi</h2>
                <div class="description-text">
                    {!! nl2br(e($assignment->description)) !!}
                </div>
                <div class="deadline-box">
                    <div style="font-size: 2rem;">📅</div>
                    <div>
                        <div style="font-weight: 700; color: #92400e;">Termiņš</div>
                        <div style="font-size: 1.25rem; font-weight: 800; color: #92400e;">
                            {{ optional($assignment->due_date)->format('d.m.Y H:i') ?? 'Nav norādīts' }}
                        </div>
                        @if(optional($assignment->due_date)?->isPast())
                            <div style="margin-top: 0.5rem; color: #991b1b; font-weight: 600;">
                                ⚠️ Uzdevuma termiņš ir beidzies
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Teacher Resources (for students) -->
            @if(!$isTeacher)
                @php $teacherFiles = $files->where('user_id', $assignment->teacher_id); @endphp
                @if($teacherFiles->isNotEmpty())
                    <div class="resources-card">
                        <div class="resources-bg"></div>
                        <h2 class="card-title" style="color: white; border-bottom-color: rgba(255,255,255,0.3);">
                            📚 Materiāli no Skolotāja
                        </h2>
                        <div style="position: relative; z-index: 2;">
                            @foreach($teacherFiles as $f)
                                <a href="{{ route('file.download', $f->id) }}" 
                                   class="file-item" 
                                   style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: white;">
                                    <div class="file-header">
                                        <span class="file-name">
                                            📥 {{ $f->original_name }}
                                        </span>
                                        <span style="opacity: 0.8;">
                                            {{ round($f->size/1024, 1) }} KB
                                        </span>
                                    </div>
                                    <div class="file-meta">
                                        <span>⏰ {{ $f->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

            <!-- Submissions Section -->
            <div class="submissions-card">
                <h2 class="card-title">
                    @if($isTeacher)
                        📄 Iesniegti Faili
                    @else
                        📤 Tavi Iesniegumi
                    @endif
                </h2>

                @php $studentFiles = $files->where('user_id', '!=', $assignment->teacher_id); @endphp
                @if($studentFiles->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            @if($isTeacher) 📭 @else 📄 @endif
                        </div>
                        <h3 style="color: #6b7280; margin: 0 0 0.5rem 0;">
                            @if($isTeacher)
                                Vēl nav iesniegto failu
                            @else
                                Vēl neesi neko iesniedzis
                            @endif
                        </h3>
                        <p style="margin: 0;">Sāc ar augšuplādi zemāk 👇</p>
                    </div>
                @else
                    <div>
                        @foreach($studentFiles as $f)
                            <div class="file-item">
                                <div class="file-header">
                                    @if($f->path)
                                        <a href="{{ route('file.download', $f->id) }}" class="file-name">
                                            📥 {{ $f->original_name }}
                                        </a>
                                    @else
                                        <span class="file-name">📝 Tikai Piezīme</span>
                                    @endif
                                    <span style="color: #6b7280; font-size: 0.9rem;">
                                        {{ round($f->size/1024, 1) }} KB
                                    </span>
                                </div>
                                <div class="file-meta">
                                    <span>👤 {{ optional($f->user)->name }}</span>
                                    <span>⏰ {{ $f->created_at->diffForHumans() }}</span>
                                </div>
                                @if($f->note)
                                    <div class="file-note">
                                        <strong>💬 Piezīme:</strong> {{ $f->note }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Upload Form -->
            @if($isTeacher)
                <div class="upload-card" style="border-style: solid;">
                    <h2 class="card-title">📚 Pievienot Materiālus</h2>
                    <form method="POST" action="{{ route('assignment.upload', $assignment->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">📎 Izvēlieties failu</label>
                            <input type="file" name="file" class="form-input" required>
                        </div>
                        <button type="submit" class="submit-btn">
                            📤 Augšuplādēt Materiālu
                        </button>
                    </form>
                </div>
            @else
                <div class="upload-card">
                    <h2 class="card-title">📤 Iesniegt Savu Darbu</h2>
                    <form method="POST" action="{{ route('assignment.upload', $assignment->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">📎 Fails (Nav Obligāti)</label>
                            <input type="file" name="file" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">💬 Piezīme Skolotājam (Nav Obligāti)</label>
                            <textarea name="note" class="form-input form-textarea" placeholder="Rakstiet jebkādas piezīmes vai komentārus savam skolotājam..."></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            📤 Iesniegt Darbu
                        </button>
                    </form>
                </div>

                <!-- Messages -->
                @if($errors->any())
                    <div class="alert alert-error">
                        ❌ {{ $errors->first() }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        ✅ {{ session('success') }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-layout>