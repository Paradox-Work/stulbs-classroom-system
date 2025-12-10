<x-layout title="Admin Dashboard">
    <style>
        /* ENHANCED MODERN ADMIN THEME */
        :root {
            --primary: #0F4C75;
            --primary-dark: #0c3a5c;
            --secondary: #3282B8;
            --accent: #BBE1FA;
            --light: #f0f9ff;
            --dark: #1B262C;
            --bg: linear-gradient(135deg, #f5f7fa 0%, #e3f2fd 100%);
            --card: rgba(255, 255, 255, 0.95);
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --gradient: linear-gradient(135deg, #0F4C75 0%, #3282B8 100%);
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        .admin-container {
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Inter', -apple-system, sans-serif;
            overflow-x: hidden;
        }
        
        /* Modern Header */
        .admin-header {
            background: var(--gradient);
            color: white;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            animation: slideDown 0.8s ease-out;
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .admin-bg {
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(187, 225, 250, 0.1);
            border-radius: 50%;
            top: -300px;
            right: -300px;
            animation: rotate 40s linear infinite;
        }
        
        .admin-header-content {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-welcome h1 {
            font-size: 3rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.3s forwards;
        }
        
        .admin-welcome p {
            margin: 0;
            color: rgba(187, 225, 250, 0.9);
            font-size: 1.2rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
        }
        
        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.7s forwards;
            position: relative;
            overflow: hidden;
        }
        
        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .logout-btn:hover::before {
            left: 100%;
        }
        
        /* Modern Navigation Tabs */
        .admin-tabs {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 0 2rem;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .tab-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 0.5rem;
            overflow-x: auto;
            padding: 1rem 0;
        }
        
        .tab {
            padding: 1rem 2rem;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            cursor: pointer;
            border-radius: 12px;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            opacity: 0.7;
        }
        
        .tab:hover {
            background: rgba(15, 76, 117, 0.1);
            color: var(--primary);
            opacity: 1;
            transform: translateY(-2px);
        }
        
        .tab.active {
            background: var(--gradient);
            color: white;
            opacity: 1;
            box-shadow: 0 8px 20px rgba(15, 76, 117, 0.3);
        }
        
        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 2px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        
        /* Main Content */
        .admin-main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Enhanced Stats Grid */
        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .admin-stat {
            background: var(--card);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .admin-stat:nth-child(1) { animation-delay: 0.2s; }
        .admin-stat:nth-child(2) { animation-delay: 0.3s; }
        .admin-stat:nth-child(3) { animation-delay: 0.4s; }
        .admin-stat:nth-child(4) { animation-delay: 0.5s; }
        
        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }
        
        .admin-stat:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(15, 76, 117, 0.15);
            border-color: rgba(15, 76, 117, 0.2);
        }
        
        .admin-stat-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 8px 20px rgba(15, 76, 117, 0.3);
            transition: all 0.3s ease;
        }
        
        .admin-stat:hover .admin-stat-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 25px rgba(15, 76, 117, 0.4);
        }
        
        .admin-stat-content h3 {
            margin: 0;
            font-size: 0.9rem;
            color: var(--dark);
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
        }
        
        .admin-stat-content p {
            margin: 0.5rem 0 0;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }
        
        /* Enhanced Management Card */
        .manage-card {
            background: var(--card);
            border-radius: 25px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s ease-out forwards;
            animation-delay: 0.6s;
        }
        
        .card-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 2rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .card-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        /* Enhanced Users Table */
        .users-table-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        
        .users-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
        }
        
        .users-table thead {
            background: var(--light);
        }
        
        .users-table th {
            padding: 1.5rem;
            text-align: left;
            font-weight: 700;
            color: var(--primary);
            border-bottom: 2px solid var(--accent);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .users-table tbody tr {
            transition: all 0.3s ease;
        }
        
        .users-table tbody tr:hover {
            background: var(--light);
            transform: translateX(5px);
        }
        
        .users-table td {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(15, 76, 117, 0.3);
        }
        
        .role-badge {
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }
        
        .role-admin {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .role-teacher {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.05));
            color: #2563eb;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .role-student {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            border: none;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .action-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .action-btn:hover::after {
            animation: ripple 1s ease-out;
        }
        
        .action-edit {
            background: linear-gradient(135deg, var(--light), #e0f2fe);
            color: var(--primary);
            border: 1px solid var(--accent);
        }
        
        .action-reset {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .action-delete {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Enhanced Activity Log */
        .activity-list {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        
        .activity-item {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .activity-item:hover {
            background: var(--light);
            transform: translateX(5px);
        }
        
        .activity-icon {
            width: 50px;
            height: 50px;
            background: var(--light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .activity-item:hover .activity-icon {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-user {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
        }
        
        .activity-time {
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.6;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Enhanced Create User Form */
        .create-form {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 25px;
            padding: 3rem;
            border: 2px dashed var(--accent);
            backdrop-filter: blur(10px);
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            font-size: 1rem;
            color: var(--dark);
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(15, 76, 117, 0.1);
            background: white;
            transform: translateY(-2px);
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
        }
        
        .btn-primary {
            background: var(--gradient);
            color: white;
            padding: 1.25rem 2.5rem;
            border-radius: 15px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 10px 25px rgba(15, 76, 117, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(15, 76, 117, 0.4);
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .btn-primary:hover::after {
            animation: ripple 1s ease-out;
        }
        
        /* Enhanced System Overview Cards */
        .system-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .system-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .system-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }
        
        .system-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(15, 76, 117, 0.15);
        }
        
        /* Enhanced Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #9ca3af;
        }
        
        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
        }
        
        /* Enhanced Alert Messages */
        .alert {
            padding: 1.5rem 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.5s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.1);
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
        
        /* Enhanced Modal */
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
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            animation: modalIn 0.4s ease;
            position: relative;
        }
        
        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
            border-radius: 25px 25px 0 0;
        }
        
        /* Quick Actions Cards */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .action-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(15, 76, 117, 0.15);
            border-color: rgba(15, 76, 117, 0.2);
        }
        
        .action-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .admin-header-content {
                flex-direction: column;
                gap: 2rem;
                text-align: center;
            }
            
            .admin-welcome h1 {
                font-size: 2.5rem;
            }
            
            .system-cards {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .admin-main {
                padding: 1.5rem;
            }
            
            .admin-stats {
                grid-template-columns: 1fr;
            }
            
            .tab-container {
                padding-bottom: 1rem;
                overflow-x: auto;
            }
            
            .tab {
                padding: 0.75rem 1.5rem;
            }
            
            .users-table {
                display: block;
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .action-btn {
                width: 100%;
                justify-content: center;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn-primary, .action-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- Modern Admin Layout -->
    <div class="admin-container">
        <!-- Enhanced Header -->
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
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="logout-btn">
                    <span>🚪</span>
                    Iziet
                </button>
            </div>
        </div>

        <!-- Modern Navigation Tabs -->
        <div class="admin-tabs">
            <div class="tab-container">
                <button class="tab active" onclick="switchTab('overview')">
                    <span>📊</span>
                    Pārskats
                </button>
                <button class="tab" onclick="switchTab('users')">
                    <span>👥</span>
                    Lietotāji
                </button>
                <button class="tab" onclick="switchTab('activity')">
                    <span>📋</span>
                    Darbību Vēsture
                </button>
                <button class="tab" onclick="switchTab('create')">
                    <span>➕</span>
                    Izveidot Lietotāju
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Enhanced Alerts -->
            @if (session('success'))
                <div class="alert alert-success">
                    <span>✅</span>
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-error">
                    <span>❌</span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Overview Tab (Default) -->
            <div id="overview-tab" class="tab-content">
                <!-- Enhanced Stats Bar -->
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

                <!-- Enhanced System Overview -->
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>📊</span>
                        Sistēmas Pārskats
                    </h2>
                    
                    <div class="system-cards">
                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: var(--primary); font-size: 1.1rem; font-weight: 700;">📖 Kursi</h4>
                                    <p style="margin: 0; font-size: 2.5rem; font-weight: 800; color: var(--primary);">{{ \App\Models\Subject::count() }}</p>
                                </div>
                                <div style="font-size: 3rem; color: var(--accent); opacity: 0.8;">📖</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Aktīvi kursi sistēmā</p>
                        </div>

                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: #2d7e2d; font-size: 1.1rem; font-weight: 700;">✏️ Uzdevumi</h4>
                                    <p style="margin: 0; font-size: 2.5rem; font-weight: 800; color: #2d7e2d;">{{ \App\Models\Assignment::count() }}</p>
                                </div>
                                <div style="font-size: 3rem; color: #86efac; opacity: 0.8;">✏️</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Kopējie uzdevumi</p>
                        </div>

                        <div class="system-card">
                            <div style="display: flex; justify-content: space-between; align-items: start;">
                                <div>
                                    <h4 style="margin: 0 0 0.75rem; color: #8B5E00; font-size: 1.1rem; font-weight: 700;">📤 Iesniegumi</h4>
                                    <p style="margin: 0; font-size: 2.5rem; font-weight: 800; color: #8B5E00;">{{ \App\Models\AssignmentFile::count() }}</p>
                                </div>
                                <div style="font-size: 3rem; color: #fde68a; opacity: 0.8;">📤</div>
                            </div>
                            <p style="margin: 0.5rem 0 0; color: var(--gray); font-size: 0.9rem;">Kopējās iesniegšanas</p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Quick Actions -->
                <div class="manage-card">
                    <h2 class="card-title">
                        <span>⚡</span>
                        Ātrās Darbības
                    </h2>
                    
                    <div class="quick-actions">
                        <div class="action-card" onclick="switchTab('create')">
                            <span class="action-icon">➕</span>
                            <h3 style="margin: 0 0 0.5rem; color: var(--primary);">Izveidot Lietotāju</h3>
                            <p style="margin: 0; color: var(--gray); font-size: 0.9rem;">Pievienot jaunu lietotāju sistēmai</p>
                        </div>
                        
                        <div class="action-card" onclick="switchTab('users')">
                            <span class="action-icon">👥</span>
                            <h3 style="margin: 0 0 0.5rem; color: var(--primary);">Pārvaldīt Lietotājus</h3>
                            <p style="margin: 0; color: var(--gray); font-size: 0.9rem;">Rediģēt lomas un atiestatīt paroles</p>
                        </div>
                        
                        <div class="action-card" onclick="switchTab('activity')">
                            <span class="action-icon">📋</span>
                            <h3 style="margin: 0 0 0.5rem; color: var(--primary);">Skatīt Logus</h3>
                            <p style="margin: 0; color: var(--gray); font-size: 0.9rem;">Auditēt sistēmas darbības</p>
                        </div>
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
                    
                    @if($users->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">👥</div>
                            <h3 style="color