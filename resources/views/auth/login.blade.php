<x-layout title="Login">
    <style>
        /* LOGIN PAGE - MODERN ORANGE THEME */
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
        
        .login-container {
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
        .login-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 80% 20%, rgba(249, 115, 22, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(251, 146, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 60% 60%, rgba(254, 215, 170, 0.08) 0%, transparent 50%);
            animation: bgFlow 25s ease-in-out infinite;
        }
        
        @keyframes bgFlow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .login-card {
            background: var(--card);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 25px 70px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(0, 0, 0, 0.02),
                inset 0 0 0 1px rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
            transform: translateZ(20px);
        }
        
        .login-icon {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            box-shadow: 
                0 10px 25px rgba(249, 115, 22, 0.4),
                inset 0 1px 1px rgba(255, 255, 255, 0.3);
            animation: iconFloat 6s ease-in-out infinite;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }
        
        .login-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin: 0 0 0.5rem 0;
            background: linear-gradient(135deg, var(--dark) 30%, var(--primary) 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }
        
        .login-subtitle {
            color: #64748b;
            font-size: 1rem;
            margin: 0;
            opacity: 0.9;
        }
        
        /* Welcome Back Animation */
        .welcome-text {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.95rem;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .welcome-text::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: var(--primary);
            animation: welcomeLine 2s ease-in-out infinite;
        }
        
        @keyframes welcomeLine {
            0%, 100% { width: 40px; }
            50% { width: 80px; }
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
            transform: translateZ(10px);
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3.5rem;
            border: 2px solid var(--input-border);
            border-radius: 12px;
            font-size: 1rem;
            color: var(--dark);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
            font-weight: 500;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--input-focus);
            box-shadow: 
                0 0 0 4px rgba(249, 115, 22, 0.15),
                0 10px 20px rgba(0, 0, 0, 0.05);
            background: white;
            transform: translateY(-2px);
        }
        
        .input-icon {
            position: absolute;
            left: 1.25rem;
            top: 2.8rem;
            color: var(--primary);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .form-input:focus + .input-icon {
            color: var(--primary-dark);
            transform: scale(1.2) rotate(10deg);
        }
        
        /* Checkbox Styling */
        .remember-group {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            transform: translateZ(5px);
        }
        
        .remember-checkbox {
            width: 20px;
            height: 20px;
            margin-right: 0.75rem;
            cursor: pointer;
            accent-color: var(--primary);
            position: relative;
        }
        
        .remember-label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            color: #555;
            font-size: 0.95rem;
            user-select: none;
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
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 1.5rem;
            box-shadow: 
                0 10px 25px rgba(249, 115, 22, 0.3),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transform: translateZ(15px);
        }
        
        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px) translateZ(20px);
            box-shadow: 
                0 15px 35px rgba(249, 115, 22, 0.4),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }
        
        .submit-btn:hover::before {
            left: 100%;
        }
        
        .submit-btn:active {
            transform: translateY(0) translateZ(10px);
        }
        
        /* Sign Up Link */
        .signup-link {
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
            font-size: 0.95rem;
            transform: translateZ(5px);
        }
        
        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            padding: 0.25rem 0.5rem;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, transparent, rgba(249, 115, 22, 0.1));
            border-radius: 6px;
        }
        
        .signup-link a:hover {
            color: var(--primary-dark);
            background: linear-gradient(135deg, transparent, rgba(249, 115, 22, 0.2));
        }
        
        /* Forgot Password */
        .forgot-password {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        
        .forgot-password a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding-bottom: 2px;
        }
        
        .forgot-password a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: var(--primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .forgot-password a:hover::after {
            transform: scaleX(1);
        }
        
        /* 3D Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0.1;
            z-index: 1;
            animation: float3D 20s ease-in-out infinite;
            transform-style: preserve-3d;
        }
        
        .element-1 {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        
        .element-2 {
            width: 80px;
            height: 80px;
            bottom: 20%;
            right: 15%;
            animation-delay: -7s;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
        
        .element-3 {
            width: 60px;
            height: 60px;
            top: 40%;
            right: 25%;
            animation-delay: -14s;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }
        
        @keyframes float3D {
            0%, 100% {
                transform: translate3d(0, 0, 0) rotate(0deg);
            }
            33% {
                transform: translate3d(20px, -20px, 20px) rotate(120deg);
            }
            66% {
                transform: translate3d(-15px, 15px, -20px) rotate(240deg);
            }
        }
        
        /* Quick Login Options */
        .quick-login {
            margin-top: 2rem;
            text-align: center;
        }
        
        .quick-login-title {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .social-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        
        .social-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .login-container {
                padding: 1rem;
            }
            
            .login-card {
                padding: 2rem;
            }
            
            .login-title {
                font-size: 1.8rem;
            }
            
            .social-buttons {
                gap: 0.75rem;
            }
        }
    </style>

    <div class="login-container">
        <!-- Animated Background -->
        <div class="login-bg"></div>
        
        <!-- 3D Floating Elements -->
        <div class="floating-element element-1"></div>
        <div class="floating-element element-2"></div>
        <div class="floating-element element-3"></div>

        <!-- Login Card -->
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="login-icon">
                    <span>🔐</span>
                </div>
                <h1 class="login-title">Pieslēgties</h1>
                <p class="login-subtitle">Ievadiet savus akreditācijas datus</p>
                <div class="welcome-text">Laipni lūgti atpakaļ! 👋</div>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="error-container" style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05)); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem; color: var(--error);">
                    <ul style="margin: 0; padding-left: 1.25rem;">
                        @foreach ($errors->all() as $error)
                            <li style="margin: 0.4rem 0; font-size: 0.9rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label class="form-label">
                        <span>📧</span> E-Pasts
                    </label>
                    <div style="position: relative;">
                        <input type="email" name="email" value="{{ old('email') }}" required 
                               class="form-input" placeholder="jūsu@epasts.com">
      
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label class="form-label">
                        <span>🔒</span> Parole
                    </label>
                    <div style="position: relative;">
                        <input type="password" name="password" required 
                               class="form-input" placeholder="Jūsu parole">
                      
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <span>🔐</span>
                    Pieslēgties
                </button>

                <!-- Divider -->
                <div style="display: flex; align-items: center; margin: 2rem 0; color: #94a3b8;">
                    <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                    <div style="padding: 0 1rem; font-size: 0.9rem;">Vai pieslēgties caur</div>
                    <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                </div>

                <!-- Sign Up Link -->
                <div class="signup-link">
                    Nav uztaisīts konts? 
                    <a href="{{ route('register.show') }}">Izveidot kontu</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add focus effect to form
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateZ(15px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateZ(10px)';
            });
        });
        
        // Button ripple effect
        document.querySelector('.submit-btn').addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.borderRadius = '50%';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.width = '100px';
            ripple.style.height = '100px';
            ripple.style.marginLeft = '-50px';
            ripple.style.marginTop = '-50px';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    </script>
</x-layout>