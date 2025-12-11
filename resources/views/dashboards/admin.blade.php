<x-layout title="Admin Dashboard">
    <style>
        /* ADMIN DASHBOARD - MODERN BLUE THEME */
        :root {
            --primary: #0F4C75;
            --primary-dark: #0c3a5c;
            --secondary: #3282B8;
            --accent: #BBE1FA;
            --light: #f0f9ff;
            --dark: #1B262C;
            --bg: #f5f7fa;
            --card: white;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --gray: #6b7280;
            --light-gray: #f9fafb;
        }
        
        .admin-container {
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        
        /* Header */
        .admin-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .admin-bg {
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(187, 225, 250, 0.1);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: rotate 40s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .admin-header-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-welcome h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .admin-welcome p {
            margin: 0;
            color: rgba(187, 225, 250, 0.9);
            font-size: 1.1rem;
        }
        
        /* Navigation Tabs */
        .admin-tabs {
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
        .admin-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Stats Grid */
        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .admin-stat {
            background: var(--card);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        
        .admin-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .admin-stat-icon {
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
        
        .admin-stat-content h3 {
            margin: 0;
            font-size: 0.9rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .admin-stat-content p {
            margin: 0.25rem 0 0;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
        }
        
        /* Management Card */
        .manage-card {
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
        
        /* Users Table */
        .users-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .users-table th {
            background: var(--light);
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            color: var(--primary);
            border-bottom: 2px solid var(--accent);
        }
        
        .users-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }
        
        .role-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .role-admin {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        
        .role-teacher {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }
        
        .role-student {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .action-edit {
            background: var(--light);
            color: var(--primary);
            border: 1px solid var(--accent);
        }
        
        .action-reset {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .action-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Activity Log */
        .activity-list {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .activity-item {
            padding: 1.25rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        
        .activity-item:hover {
            background: var(--light);
        }
        
        .activity-icon {
            width: 36px;
            height: 36px;
            background: var(--light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1rem;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-user {
            font-weight: 700;
            color: var(--dark);
        }
        
        .activity-time {
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        /* Create User Form */
        .create-form {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 16px;
            padding: 2rem;
            border: 2px dashed var(--accent);
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
            box-shadow: 0 0 0 4px rgba(15, 76, 117, 0.1);
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
            box-shadow: 0 10px 20px rgba(15, 76, 117, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(15, 76, 117, 0.4);
        }
        
        /* System Overview Cards */
        .system-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .system-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .system-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
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
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            animation: modalIn 0.3s ease;
        }
        
        @keyframes modalIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .admin-header-content {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
            
            .tab-container {
                overflow-x: auto;
                padding-bottom: 1rem;
            }
            
            .admin-stats {
                grid-template-columns: 1fr;
            }
            
            .users-table {
                display: block;
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .system-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="admin-container">
        <!-- Header -->
        <div class="admin-header">
            <div class="admin-bg"></div>
            <div class="admin-header-content">
                <div class="admin-welcome">
                    <h1>
                        <span>⚙️</span>
                        Administratora Panelis
                    </h1>
                    <p>Sveiki, <strong>{{ auth()->user()->name }}</strong> — jums ir pilnas administrācijas tiesības</p>
                </div>
                <div>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="action-btn" style="background: var(--accent); color: var(--primary); padding: 0.75rem 1.5rem; border-radius: 12px; text-decoration: none; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; cursor: pointer; border: none;">
                        <span>🚪</span>
                        Iziet
                    </button>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="admin-tabs">
            <div class="tab-container">
                <button class="tab active" onclick="switchTab('overview')">📊 Pārskats</button>
                <button class="tab" onclick="switchTab('users')">👥 Lietotāji</button>
                <button class="tab" onclick="switchTab('activity')">📋 Darbību Vēsture</button>
                <button class="tab" onclick="switchTab('create')">➕ Izveidot Lietotāju</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="admin-main">
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
                <div class="admin-stats">
                    <div class="admin-stat">
                        <div class="admin-stat-icon">👥</div>
                        <div class="admin-stat-content">
                            <h3>Kopējie Lietotāji</h3>
                            <p>{{ \App\Models\User::count() }}</p>
                        </div>
                    </div>
                    <div class="admin-stat">
                        <div class="admin-stat-icon">🎓</div>
                        <div class="admin-stat-content">
                            <h3>Skolotāji</h3>
                            <p>{{ \App\Models\User::where('role', 'teacher')->count() }}</p>
                        </div>
                    </div>
                    <div class="admin-stat">
                        <div class="admin-stat-icon">📚</div>
                        <div class="admin-stat-content">
                            <h3>Studenti</h3>
                            <p>{{ \App\Models\User::where('role', 'student')->count() }}</p>
                        </div>
                    </div>
                    <div class="admin-stat">
                        <div class="admin-stat-icon">⚙️</div>
                        <div class="admin-stat-content">
                            <h3>Administratori</h3>
                            <p>{{ \App\Models\User::where('role', 'admin')->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- System Overview -->
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>📊</span>
                        Sistēmas Pārskats
                    </h2>
                    
                    <div class="system-cards">
                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: var(--primary); font-size: 1rem; font-weight: 700;">📖 Kursi</h4>
                                    <p style="margin: 0; font-size: 2rem; font-weight: 800; color: var(--primary);">{{ \App\Models\Subject::count() }}</p>
                                </div>
                                <div style="font-size: 2.5rem; color: var(--accent);">📖</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Aktīvi kursi sistēmā</p>
                        </div>

                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: #2d7e2d; font-size: 1rem; font-weight: 700;">✏️ Uzdevumi</h4>
                                    <p style="margin: 0; font-size: 2rem; font-weight: 800; color: #2d7e2d;">{{ \App\Models\Assignment::count() }}</p>
                                </div>
                                <div style="font-size: 2.5rem; color: #86efac;">✏️</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Kopējie uzdevumi</p>
                        </div>

                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: #8B5E00; font-size: 1rem; font-weight: 700;">📤 Iesniegumi</h4>
                                    <p style="margin: 0; font-size: 2rem; font-weight: 800; color: #8B5E00;">{{ \App\Models\AssignmentFile::count() }}</p>
                                </div>
                                <div style="font-size: 2.5rem; color: #fde68a;">📤</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Kopējās iesniegšanas</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>⚡</span>
                        Ātrās Darbības
                    </h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <button onclick="switchTab('create')" class="action-btn" style="background: var(--primary); color: white; padding: 1rem; justify-content: center;">
                            <span>➕</span>
                            Izveidot Lietotāju
                        </button>
                        <button onclick="switchTab('users')" class="action-btn" style="background: var(--secondary); color: white; padding: 1rem; justify-content: center;">
                            <span>👥</span>
                            Pārvaldīt Lietotājus
                        </button>
                        <button onclick="switchTab('activity')" class="action-btn" style="background: var(--accent); color: var(--primary); padding: 1rem; justify-content: center;">
                            <span>📋</span>
                            Skatīt Logus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Users Tab -->
            <div id="users-tab" class="tab-content" style="display: none;">
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>👥</span>
                        Lietotāju Pārvaldība
                    </h2>
                    
                    @php
                        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
                    @endphp
                    
                    @if($users->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">👥</div>
                            <h3 style="color: var(--gray); margin: 0 0 0.5rem 0;">
                                Nav lietotāju
                            </h3>
                            <p style="margin: 0;">Izveidojiet pirmo lietotāju</p>
                        </div>
                    @else
                        <div style="overflow-x: auto;">
                            <table class="users-table">
                                <thead>
                                    <tr>
                                        <th>Lietotājs</th>
                                        <th>E-pasts</th>
                                        <th>Loma</th>
                                        <th>Reģistrēts</th>
                                        <th>Darbības</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div class="user-avatar">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 600;">{{ $user->name }}</div>
                                                        <div style="font-size: 0.85rem; color: var(--gray);">ID: {{ $user->id }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="role-badge role-{{ $user->role }}">
                                                    {{ $user->role }}
                                                </span>
                                            </td>
                                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')" class="action-btn action-edit">
                                                        ✏️ Rediģēt
                                                    </button>
                                                    <button onclick="resetPassword({{ $user->id }}, '{{ $user->name }}')" class="action-btn action-reset">
                                                        🔄 Atiestatīt Paroli
                                                    </button>
                                                    @if($user->id !== auth()->id())
                                                        <button onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')" class="action-btn action-delete">
                                                            🗑️ Dzēst
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

<!-- Activity Tab -->
<div id="activity-tab" class="tab-content" style="display: none;">
    <div class="manage-card">
        <h2 class="card-title">
            <span>📋</span>
            Sistēmas Darbību Vēsture
        </h2>
        
        <!-- Activity Log -->
        <div class="activity-list">
            @forelse($activities as $activity)
                <div class="activity-item">
                    <div class="activity-icon">
                        @switch($activity->action)
                            @case('user.created')
                                👤
                                @break
                            @case('user.updated')
                                ✏️
                                @break
                            @case('user.deleted')
                                🗑️
                                @break
                            @case('user.role_changed')
                                🔄
                                @break
                            @case('user.password_reset')
                                🔒
                                @break
                            @default
                                📝
                        @endswitch
                    </div>
                    <div class="activity-content">
                        <div>
                            <span class="activity-user">{{ $activity->user->name ?? 'Sistēma' }}</span>
                            <span style="color: var(--gray);"> — {{ $activity->description }}</span>
                        </div>
                        <div class="activity-time">
                            {{ $activity->created_at->diffForHumans() }}
                            • IP: {{ $activity->ip_address }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3 style="color: var(--gray); margin: 0 0 0.5rem 0;">
                        Nav darbību
                    </h3>
                    <p style="margin: 0;">Darbības tiks reģistrētas automātiski</p>
                </div>
            @endforelse
        </div>
        
    </div>
</div>

            <!-- Create User Tab -->
            <div id="create-tab" class="tab-content" style="display: none;">
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>➕</span>
                        Izveidot Jaunu Lietotāju
                    </h2>
                    
                    <form method="POST" action="{{ route('admin.users.store') }}" class="create-form">
                        @csrf
                        
                        <div class="form-group">
                            <label class="form-label">Vārds</label>
                            <input type="text" name="name" class="form-input" placeholder="Ievadiet lietotāja vārdu" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">E-pasts</label>
                            <input type="email" name="email" class="form-input" placeholder="piemērs@epasts.com" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Parole</label>
                            <input type="password" name="password" class="form-input" placeholder="Vismaz 8 rakstzīmes" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Apstiprināt Paroli</label>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Atkārtojiet paroli" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Loma</label>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem;">
                                <label style="display: flex; flex-direction: column; padding: 1rem; background: white; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; text-align: center;">
                                    <input type="radio" name="role" value="admin" style="width: 20px; height: 20px; margin: 0 auto 0.75rem;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">⚙️</div>
                                    <div style="font-weight: 700; color: var(--dark);">Administrators</div>
                                </label>
                                
                                <label style="display: flex; flex-direction: column; padding: 1rem; background: white; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; text-align: center;">
                                    <input type="radio" name="role" value="teacher" style="width: 20px; height: 20px; margin: 0 auto 0.75rem;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">👨‍🏫</div>
                                    <div style="font-weight: 700; color: var(--dark);">Skolotājs</div>
                                </label>
                                
                                <label style="display: flex; flex-direction: column; padding: 1rem; background: white; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; text-align: center;">
                                    <input type="radio" name="role" value="student" checked style="width: 20px; height: 20px; margin: 0 auto 0.75rem;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">👨‍🎓</div>
                                    <div style="font-weight: 700; color: var(--dark);">Students</div>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <span>✨</span>
                                Izveidot Lietotāju
                            </button>
                            <button type="button" onclick="switchTab('users')" class="action-btn action-edit" style="padding: 1rem 2rem;">
                                Atcelt
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3 style="margin: 0 0 1.5rem 0; color: var(--primary);">✏️ Rediģēt Lietotāju</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Vārds</label>
                    <input type="text" name="name" id="editName" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">E-pasts</label>
                    <input type="email" name="email" id="editEmail" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Loma</label>
                    <select name="role" id="editRole" class="form-input" required>
                        <option value="admin">Administrators</option>
                        <option value="teacher">Skolotājs</option>
                        <option value="student">Students</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        Saglabāt Izmaiņas
                    </button>
                    <button type="button" onclick="closeModal()" class="action-btn action-edit" style="padding: 1rem 2rem;">
                        Atcelt
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div id="resetModal" class="modal">
        <div class="modal-content">
            <h3 style="margin: 0 0 1.5rem 0; color: var(--primary);">🔄 Atiestatīt Paroli</h3>
            <form id="resetForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Jauna parole lietotājam <span id="resetUserName" style="font-weight: 700;"></span></label>
                    <input type="password" name="password" class="form-input" placeholder="Ievadiet jauno paroli" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Apstiprināt Paroli</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Atkārtojiet paroli" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <span>🔒</span>
                        Atiestatīt Paroli
                    </button>
                    <button type="button" onclick="closeModal()" class="action-btn action-edit" style="padding: 1rem 2rem;">
                        Atcelt
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 style="margin: 0 0 1.5rem 0; color: #dc2626;">🗑️ Dzēst Lietotāju</h3>
            <p style="margin: 0 0 1.5rem 0; color: var(--gray);">
                Vai tiešām vēlaties dzēst lietotāju <span id="deleteUserName" style="font-weight: 700;"></span>?
                Šī darbība ir neatgriezeniska!
            </p>
            
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="form-actions">
                    <button type="submit" class="action-btn action-delete" style="padding: 1rem 2rem;">
                        <span>🗑️</span>
                        Dzēst Lietotāju
                    </button>
                    <button type="button" onclick="closeModal()" class="action-btn action-edit" style="padding: 1rem 2rem;">
                        Atcelt
                    </button>
                </div>
            </form>
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
            localStorage.setItem('activeAdminTab', tabName);
        }

        // Initialize with saved tab or overview
        document.addEventListener('DOMContentLoaded', function() {
            const savedTab = localStorage.getItem('activeAdminTab') || 'overview';
            switchTab(savedTab);
            
            // Update tab buttons
            document.querySelectorAll('.tab').forEach(button => {
                button.classList.remove('active');
                if (button.textContent.includes(savedTab === 'overview' ? 'Pārskats' : 
                                                savedTab === 'users' ? 'Lietotāji' :
                                                savedTab === 'activity' ? 'Darbību' : 'Izveidot')) {
                    button.classList.add('active');
                }
            });
        });

        // Modal functions
        function editUser(userId, name, email, role) {
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editForm').action = `/admin/users/${userId}`;
            document.getElementById('editModal').style.display = 'flex';
        }

        function resetPassword(userId, name) {
            document.getElementById('resetUserName').textContent = name;
            document.getElementById('resetForm').action = `/admin/users/${userId}/reset-password`;
            document.getElementById('resetModal').style.display = 'flex';
        }

        function deleteUser(userId, name) {
            document.getElementById('deleteUserName').textContent = name;
            document.getElementById('deleteForm').action = `/admin/users/${userId}`;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.style.display = 'none';
            });
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal();
            }
        }

        // Initialize role selection styling
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[name="role"]').forEach(radio => {
                // Initialize selected state
                if (radio.checked) {
                    const selectedLabel = radio.closest('label');
                    selectedLabel.style.borderColor = 'var(--primary)';
                    selectedLabel.style.background = 'linear-gradient(135deg, rgba(15, 76, 117, 0.05), rgba(50, 130, 184, 0.02))';
                }
                
                radio.addEventListener('change', function() {
                    document.querySelectorAll('label').forEach(label => {
                        label.style.borderColor = '#E0E7FF';
                        label.style.background = 'white';
                    });
                    
                    const selectedLabel = this.closest('label');
                    selectedLabel.style.borderColor = 'var(--primary)';
                    selectedLabel.style.background = 'linear-gradient(135deg, rgba(15, 76, 117, 0.05), rgba(50, 130, 184, 0.02))';
                });
            });
        });
    </script>
</x-layout>