<x-layout title="Register">
    <style>
        /* REGISTER PAGE - MODERN ORANGE THEME */
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
            --light: #fed7aa;
            --dark: #7c2d12;
            --bg: #fff7ed;
            --card: white;
            --input-border: #e2e8f0;
            --input-focus: #f97316;
            --error: #ef4444;
            --success: #10b981;
        }
        
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated Background */
        .register-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(249, 115, 22, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(251, 146, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(254, 215, 170, 0.08) 0%, transparent 50%);
            animation: bgPulse 20s ease-in-out infinite;
        }
        
        @keyframes bgPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .register-card {
            background: var(--card);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(0, 0, 0, 0.02);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 30px 80px rgba(249, 115, 22, 0.15),
                0 0 0 1px rgba(249, 115, 22, 0.1);
        }
        
        /* Header */
        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .register-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.3);
        }
        
        .register-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 0.5rem 0;
            background: linear-gradient(135deg, var(--dark), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .register-subtitle {
            color: #64748b;
            font-size: 1rem;
            margin: 0;
        }
        
        /* Errors */
        .error-container {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            color: var(--error);
        }
        
        .error-list {
            margin: 0;
            padding-left: 1.25rem;
        }
        
        .error-list li {
            margin: 0.4rem 0;
            font-size: 0.9rem;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--input-border);
            border-radius: 12px;
            font-size: 1rem;
            color: var(--dark);
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--input-focus);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
            background: white;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.8rem;
            color: var(--primary);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus + .input-icon {
            color: var(--primary-dark);
            transform: scale(1.1);
        }
        
        /* Password Strength */
        .password-strength {
            display: flex;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }
        
        .strength-bar {
            flex: 1;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 1rem;
            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(249, 115, 22, 0.4);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            padding: 0.25rem 0.5rem;
            transition: all 0.3s ease;
        }
        
        .login-link a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0.5rem;
            width: calc(100% - 1rem);
            height: 2px;
            background: var(--primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--primary-dark);
        }
        
        .login-link a:hover::after {
            transform: scaleX(1);
        }
        
        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: #94a3b8;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        
        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }
        
        /* Terms */
        .terms {
            font-size: 0.85rem;
            color: #64748b;
            text-align: center;
            margin-top: 1.5rem;
            line-height: 1.5;
        }
        
        /* Floating Orbs */
        .floating-orb {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0.1;
            z-index: 1;
            animation: float 15s ease-in-out infinite;
        }
        
        .orb-1 {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .orb-2 {
            width: 100px;
            height: 100px;
            bottom: 15%;
            right: 10%;
            animation-delay: -5s;
        }
        
        .orb-3 {
            width: 80px;
            height: 80px;
            top: 30%;
            right: 15%;
            animation-delay: -10s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .register-container {
                padding: 1rem;
            }
            
            .register-card {
                padding: 2rem;
            }
            
            .register-title {
                font-size: 1.8rem;
            }
        }
    </style>

    <div class="register-container">
        <!-- Animated Background -->
        <div class="register-bg"></div>
        
        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>

        <!-- Register Card -->
        <div class="register-card">
            <!-- Header -->
            <div class="register-header">
                <div class="register-icon">
                    <span>✨</span>
                </div>
                <h1 class="register-title">Jauna Konta Izveide</h1>
                <p class="register-subtitle">Pievienojies mūsdienīgai izglītības platformai</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="error-container">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label class="form-label">
                        <span>👤</span> Pilns Vārds
                    </label>
                    <div style="position: relative;">
                        <input type="text" name="name" value="{{ old('name') }}" required class="form-input" placeholder="Ievadiet savu vārdu">
                        
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label class="form-label">
                        <span>📧</span> E-Pasta Adrese
                    </label>
                    <div style="position: relative;">
                        <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="piemērs@epasts.com">
                    </div>
                </div>

                <!-- Password Field -->
               <!-- Password Field -->
<div class="form-group">
    <label class="form-label">
        <span>🔒</span> Parole
    </label>
    <div style="position: relative;">
        <input type="password" name="password" required class="form-input" 
               placeholder="Vismaz 12 rakstzīmes: 1 lielais burts, 1 mazais burts, 1 cipars, 1 simbols (@$!%*?&)">
    </div>
    <small style="display: block; margin-top: 0.5rem; color: var(--gray); font-size: 0.85rem;">
        📋 Prasības: vismaz 12 rakstzīmes, 1 lielais burts (A-Z), 1 mazais burts (a-z), 1 cipars (0-9), 1 simbols (@$!%*?&)
    </small>
    <div class="password-strength">
        <div class="strength-bar"></div>
        <div class="strength-bar"></div>
        <div class="strength-bar"></div>
        <div class="strength-bar"></div>
    </div>
</div>

<!-- Confirm Password Field -->
<div class="form-group">
    <label class="form-label">
        <span>✓</span> Apstiprināt Paroli
    </label>
    <div style="position: relative;">
        <input type="password" name="password_confirmation" required class="form-input" 
               placeholder="Atkārtojiet paroli">
    </div>
</div>
<!-- Role Selection - Add this section -->
<!-- In your register.blade.php, inside the role selection grid -->
<div class="form-group">
    <label class="form-label">
        <span>🎭</span> Lietotāja Loma
    </label>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 1rem; margin-top: 0.5rem;">
        <label style="display: flex; flex-direction: column; padding: 1rem; background: #f8fafc; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; transition: all 0.3s ease; text-align: center;">
            <input type="radio" name="role" value="student" checked style="width: 20px; height: 20px; accent-color: var(--primary); margin: 0 auto 0.75rem;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">👨‍🎓</div>
            <div style="font-weight: 700; color: var(--dark);">Students</div>
            <div style="font-size: 0.85rem; color: #666; margin-top: 0.25rem;">Piekļuve studentu funkcijām</div>
        </label>
        
        <label style="display: flex; flex-direction: column; padding: 1rem; background: #f8fafc; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; transition: all 0.3s ease; text-align: center;">
            <input type="radio" name="role" value="teacher" style="width: 20px; height: 20px; accent-color: var(--primary); margin: 0 auto 0.75rem;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">👨‍🏫</div>
            <div style="font-weight: 700; color: var(--dark);">Skolotājs</div>
            <div style="font-size: 0.85rem; color: #666; margin-top: 0.25rem;">Kursu un uzdevumu pārvaldība</div>
        </label>
        
        <!-- ADD THIS ADMIN OPTION -->
        <label style="display: flex; flex-direction: column; padding: 1rem; background: #f8fafc; border: 2px solid #E0E7FF; border-radius: 12px; cursor: pointer; transition: all 0.3s ease; text-align: center;">
            <input type="radio" name="role" value="admin" style="width: 20px; height: 20px; accent-color: var(--primary); margin: 0 auto 0.75rem;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">⚙️</div>
            <div style="font-weight: 700; color: var(--dark);">Administrators</div>
            <div style="font-size: 0.85rem; color: #666; margin-top: 0.25rem;">Sistēmas pārvaldība</div>
        </label>
    </div>
</div>

<!-- Add some CSS for the role selection -->
<style>
    label input[type="radio"]:checked + div + div + div {
        color: var(--primary);
    }
    
    label input[type="radio"]:checked {
        background-color: var(--primary);
    }
    
    label {
        position: relative;
    }
    
    label:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    label input[type="radio"]:checked ~ * {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(249, 115, 22, 0.05), rgba(251, 146, 60, 0.02));
    }
</style>

<script>
    // Style the radio button selection
    document.querySelectorAll('input[name="role"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('label').forEach(label => {
                label.style.borderColor = '#E0E7FF';
                label.style.background = '#f8fafc';
            });
            
            const selectedLabel = this.closest('label');
            selectedLabel.style.borderColor = 'var(--primary)';
            selectedLabel.style.background = 'linear-gradient(135deg, rgba(249, 115, 22, 0.05), rgba(251, 146, 60, 0.02))';
        });
    });
</script>
                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <span>✨</span>
                    Reģistrēties
                </button>

                <!-- Divider -->
                <div class="divider">
                    <span>Vai arī</span>
                </div>

                <!-- Login Link -->
                <div class="login-link">
                    Jau esat reģistrējies? 
                    <a href="{{ route('login.show') }}">Pieslēgties kontā</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Simple password strength indicator
        // Updated password strength indicator
document.querySelector('input[name="password"]').addEventListener('input', function(e) {
    const password = e.target.value;
    const bars = document.querySelectorAll('.strength-bar');
    let strength = 0;
    
    // Updated criteria for 12+ characters
    if (password.length >= 12) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[@$!%*?&]/.test(password)) strength++;
    
    bars.forEach((bar, index) => {
        if (index < strength) {
            bar.style.background = [
                '#ef4444',    // Red - weak
                '#f97316',    // Orange - fair
                '#f59e0b',    // Yellow - good
                '#10b981',    // Green - strong
                '#059669'     // Dark green - very strong
            ][strength - 1];
        } else {
            bar.style.background = '#e2e8f0';
        }
    });
});
    </script>
</x-layout>