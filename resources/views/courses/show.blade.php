<x-layout :title="'Kurss: ' . $subject->name">
    <style>
        /* ORANGE THEME COURSE PAGE */
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
        
        .course-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Hero Header */
        .course-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        
        .course-hero-bg {
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
        
        .course-hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .course-hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 1rem 0;
            line-height: 1.1;
        }
        
        .course-hero-subtitle {
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
        
        .course-code-display {
            background: rgba(255, 255, 255, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            font-weight: 700;
            border: 2px solid rgba(255, 255, 255, 0.4);
        }
        
        /* Main Content */
        .course-main {
            max-width: 1200px;
            margin: -2rem auto 0;
            padding: 0 2rem 4rem;
            position: relative;
            z-index: 2;
        }
        
        /* Assignments Card */
        .assignments-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
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
        
        /* Assignment Item */
        .assignment-item {
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 1.25rem;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            position: relative;
            overflow: hidden;
        }
        
        .assignment-item:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(249, 115, 22, 0.15);
        }
        
        .assignment-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .assignment-item:hover::before {
            opacity: 1;
        }
        
        .assignment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .assignment-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .assignment-icon {
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            background: rgba(249, 115, 22, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .assignment-meta {
            display: flex;
            gap: 1.5rem;
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        
        .status-overdue {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
        }
        
        .status-soon {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }
        
        .status-active {
            background: linear-gradient(135deg, #dbeafe, #e0f2fe);
            color: #1e40af;
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
        
        .grade-scored {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }
        
        .grade-pending {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #9ca3af;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        /* Course Stats (Optional) */
        .course-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(249, 115, 22, 0.1);
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
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-content p {
            margin: 0.25rem 0 0;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
        }
        
        /* Back Button */
        .course-back-btn {
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
        
        .course-back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .course-hero {
                padding: 2rem 1rem;
                clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            }
            
            .course-hero-content {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .course-hero-title {
                font-size: 2rem;
            }
            
            .course-main {
                padding: 0 1rem 2rem;
                margin-top: -1rem;
            }
            
            .assignments-card {
                padding: 1.5rem;
            }
            
            .assignment-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .course-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="course-container">
        <!-- Hero Header -->
        <div class="course-hero">
            <div class="course-hero-bg"></div>
            <div class="course-hero-content">
                <div>
                    <h1 class="course-hero-title">📖 {{ $subject->name }}</h1>
                    <div class="course-hero-subtitle">
                        <span class="hero-badge">👨‍🏫 {{ optional($subject->teacher)->name ?? '—' }}</span>
                        <span class="hero-badge">🔐 Kursa Kods: <span class="course-code-display">{{ $subject->code }}</span></span>
                    </div>
                </div>
                <a href="{{ route('dashboard.student') }}" class="course-back-btn">
                    ← Atpakaļ
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="course-main">
            <!-- Optional: Course Stats -->
            @if($assignments->isNotEmpty())
                <div class="course-stats">
                    <div class="stat-card">
                        <div class="stat-icon">📋</div>
                        <div class="stat-content">
                            <h3>Uzdevumi</h3>
                            <p>{{ $assignments->count() }}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📅</div>
                        <div class="stat-content">
                            <h3>Aktīvi</h3>
                            <p>{{ $assignments->filter(fn($a) => $a->due_date && !$a->due_date->isPast())->count() }}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">✅</div>
                        <div class="stat-content">
                            <h3>Vērtēti</h3>
                            <p>{{ $assignments->filter(fn($a) => $a->grades->isNotEmpty())->count() }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Assignments Section -->
            <div class="assignments-card">
                <h2 class="card-title">✏️ Uzdevumi</h2>

                @if($assignments->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <h3 style="color: #6b7280; margin: 0 0 0.5rem 0;">
                            Vēl nav uzdevumu
                        </h3>
                        <p style="margin: 0; max-width: 300px; margin: 0 auto;">
                            Skolotājs vēl nav pievienojis uzdevumus šim kursam.
                        </p>
                    </div>
                @else
                    <div>
                        @foreach($assignments as $assignment)
                            <a href="{{ route('assignment.show', $assignment->id) }}" class="assignment-item">
                                <div class="assignment-header">
                                    <div style="display: flex; align-items: center; gap: 1rem; flex: 1;">
                                        <div class="assignment-icon">✏️</div>
                                        <div>
                                            <h3 class="assignment-title">{{ $assignment->title }}</h3>
                                            <div class="assignment-meta">
                                                <div class="meta-item">
                                                    📅 
                                                    <strong>Termiņš:</strong> 
                                                    {{ optional($assignment->due_date)->format('d.m.Y H:i') ?? 'Nav norādīts' }}
                                                </div>
                                                <div class="meta-item">
                                                    ⏰ 
                                                    @if($assignment->due_date)
                                                        @if($assignment->due_date->isPast())
                                                            Pirms {{ $assignment->due_date->diffForHumans() }}
                                                        @else
                                                            Pēc {{ $assignment->due_date->diffForHumans() }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-end;">
                                        <!-- Status Badge -->
                                        @if(optional($assignment->due_date)->isPast())
                                            <span class="status-badge status-overdue">
                                                🔴 Pārraidīts
                                            </span>
                                        @elseif(optional($assignment->due_date)?->diffInDays(now()) <= 1)
                                            <span class="status-badge status-soon">
                                                ⚠️ Drīz beidzas
                                            </span>
                                        @else
                                            <span class="status-badge status-active">
                                                ✅ Aktīvs
                                            </span>
                                        @endif
                                        
                                        <!-- Grade Badge -->
                                        @php $grade = $assignment->grades->first(); @endphp
                                        @if($grade)
                                            <span class="grade-badge grade-scored">
                                                ✓ {{ $grade->grade }}/100
                                            </span>
                                        @else
                                            <span class="grade-badge grade-pending">
                                                ⏳ Gaida vērtējumu
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Assignment Description Preview -->
                                @if($assignment->description)
                                    <div style="color: #6b7280; font-size: 0.9rem; margin-top: 1rem; line-height: 1.5;">
                                        {{ Str::limit($assignment->description, 150) }}
                                    </div>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Add animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const assignmentItems = document.querySelectorAll('.assignment-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            assignmentItems.forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'all 0.5s ease';
                observer.observe(item);
            });
            
            // Add hover sound effect (optional)
            assignmentItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.cursor = 'pointer';
                });
            });
        });
    </script>
</x-layout>