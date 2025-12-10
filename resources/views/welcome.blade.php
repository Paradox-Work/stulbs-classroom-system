<x-layout title="Welcome - Classroom">
    <style>
        /* ENHANCED MODERN ORANGE THEME */
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
            --light: #fed7aa;
            --dark: #7c2d12;
            --bg: #fff7ed;
            --card: white;
            --gradient: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--dark);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* NEW MODERN LAYOUT */
        .modern-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            overflow: hidden;
        }
        
        /* Enhanced Header */
        .modern-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 0;
            position: relative;
            animation: slideDown 0.8s ease-out;
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo-dot {
            width: 12px;
            height: 12px;
            background: var(--secondary);
            border-radius: 50%;
            display: inline-block;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Enhanced Hero Section */
        .modern-hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            min-height: 85vh;
            padding: 4rem 0;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.3s forwards;
        }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        
        .hero-content {
            position: relative;
        }
        
        .hero-badge {
            display: inline-block;
            background: rgba(249, 115, 22, 0.1);
            color: var(--primary);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(249, 115, 22, 0.2);
            animation: badgeFloat 3s ease-in-out infinite;
        }
        
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--dark);
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .hero-title span {
            color: var(--primary);
            position: relative;
            display: inline-block;
        }
        
        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: rgba(249, 115, 22, 0.2);
            z-index: -1;
            transform: scaleX(0);
            transform-origin: left;
            animation: underlineExpand 1s ease-out 0.8s forwards;
        }
        
        @keyframes underlineExpand {
            to { transform: scaleX(1); }
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 500px;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Enhanced Button Styles */
        .button-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.7s forwards;
        }
        
        .cta-button {
            background: var(--gradient);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(249, 115, 22, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .cta-button::after {
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
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(249, 115, 22, 0.4);
        }
        
        .cta-button:hover::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% { transform: scale(0, 0); opacity: 0.5; }
            100% { transform: scale(40, 40); opacity: 0; }
        }
        
        .outline-button {
            background: transparent;
            color: var(--primary);
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: 2px solid var(--primary);
            position: relative;
            overflow: hidden;
        }
        
        .outline-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(249, 115, 22, 0.1);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .outline-button:hover {
            background: rgba(249, 115, 22, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.1);
        }
        
        .outline-button:hover::before {
            left: 0;
        }
        
        /* Enhanced Hero Visual */
        .hero-visual {
            position: relative;
            height: 500px;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.5s forwards;
        }
        
        .floating-card {
            position: absolute;
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .floating-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 30px 80px rgba(249, 115, 22, 0.2);
            border-color: var(--primary);
        }
        
        .card-1 {
            top: 0;
            right: 0;
            width: 250px;
            animation: float 6s ease-in-out infinite;
        }
        
        .card-2 {
            bottom: 0;
            left: 0;
            width: 280px;
            animation: float 7s ease-in-out infinite 1s;
        }
        
        .card-3 {
            top: 50%;
            right: 20%;
            width: 220px;
            animation: float 5s ease-in-out infinite 0.5s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }
        
        .card-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }
        
        .floating-card:hover .card-icon {
            transform: scale(1.2);
        }
        
        .card-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }
        
        .floating-card:hover .card-title {
            color: var(--primary);
        }
        
        .card-text {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }
        
        /* Enhanced Features Section */
        .features-section {
            padding: 6rem 0;
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
            animation-delay: 0.2s;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 25%;
            width: 50%;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: center;
            animation: lineExpand 1s ease-out 0.5s forwards;
        }
        
        @keyframes lineExpand {
            to { transform: scaleX(1); }
        }
        
        .section-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 3rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.7s forwards;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-item {
            background: var(--card);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .feature-item:nth-child(1) { animation-delay: 0.3s; }
        .feature-item:nth-child(2) { animation-delay: 0.4s; }
        .feature-item:nth-child(3) { animation-delay: 0.5s; }
        
        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }
        
        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(249, 115, 22, 0.15);
            border-color: rgba(249, 115, 22, 0.3);
        }
        
        .feature-icon-box {
            width: 60px;
            height: 60px;
            background: rgba(249, 115, 22, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover .feature-icon-box {
            background: rgba(249, 115, 22, 0.2);
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature-icon-box i {
            font-size: 1.5rem;
            color: var(--primary);
            transition: transform 0.3s ease;
        }
        
        .feature-item:hover .feature-icon-box i {
            transform: scale(1.2);
        }
        
        .feature-item h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
        
        .feature-item:hover h3 {
            color: var(--primary);
        }
        
        .feature-item p {
            color: #666;
            line-height: 1.6;
            transition: color 0.3s ease;
        }
        
        /* Stats Section - NEW */
        .stats-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(251, 146, 60, 0.05) 100%);
            border-radius: 30px;
            margin: 4rem 0;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 1s;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(249, 115, 22, 0.1);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* CTA Section - NEW */
        .cta-section {
            padding: 6rem 0;
            text-align: center;
            background: var(--gradient);
            color: white;
            border-radius: 30px;
            margin-top: 4rem;
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 1.2s;
        }
        
        .cta-bg {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -150px;
            right: -150px;
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }
        
        .cta-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 2.5rem;
            position: relative;
            z-index: 2;
        }
        
        /* Footer - NEW */
        .modern-footer {
            padding: 3rem 0;
            text-align: center;
            color: #666;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 4rem;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 1.4s;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .modern-hero {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3rem;
            }
            
            .hero-title {
                font-size: 2.8rem;
            }
            
            .hero-visual {
                height: 400px;
                max-width: 600px;
                margin: 0 auto;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
        }
        
        @media (max-width: 768px) {
            .modern-container {
                padding: 1rem;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .button-group {
                justify-content: center;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .logo {
                font-size: 2rem;
            }
        }
    </style>

    <!-- NEW MODERN LAYOUT -->
    <div class="modern-container">
        <!-- Header -->
        <header class="modern-header">
            <div class="logo">
                Classroom<span class="logo-dot"></span>
            </div>
            <div class="button-group">
                <a href="{{ route('login.show') }}" class="outline-button">
                    🔐 Ieet Profilā
                </a>
            </div>
        </header>

        <!-- Main Hero Section -->
        <section class="modern-hero">
            <div class="hero-content">
                <div class="hero-badge">🏆 Modernā Platforma</div>
                <h1 class="hero-title">
                    Izglītība <span>nākotnei</span> sākas šeit
                </h1>
                <p class="hero-subtitle">
                    Pievienojies revolucionārai izglītības videi, kur skolotāji un studenti var efektīvi sadarbībā mācīties, mācīt un augt kopā.
                </p>
                <div class="button-group">
                    <a href="{{ route('register.show') }}" class="cta-button">
                        ✨ Sākt tagad
                    </a>
                    <a href="#features" class="outline-button">
                        📚 Uzzināt vairāk
                    </a>
                </div>
            </div>
            
            <!-- Visual Elements -->
            <div class="hero-visual">
                <div class="floating-card card-1">
                    <div class="card-icon">📚</div>
                    <h4 class="card-title">Dinamiski Kursi</h4>
                    <p class="card-text">Reāllaikā atjaunināti mācību materiāli</p>
                </div>
                <div class="floating-card card-2">
                    <div class="card-icon">✍️</div>
                    <h4 class="card-title">Uzdevumi</h4>
                    <p class="card-text">Viegla uzdevumu pārvaldība un iesniegšana</p>
                </div>
                <div class="floating-card card-3">
                    <div class="card-icon">📊</div>
                    <h4 class="card-title">Progress</h4>
                    <p class="card-text">Detalizēta progresa analīze un atsauksmes</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Aktīvi Studenti</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Skolotāji</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Pabeigti Kursi</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Apmierinātība</span>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features-section">
            <h2 class="section-title">Viss, kas nepieciešams</h2>
            <p class="section-subtitle">
                No kursu pārvaldības līdz detalizētai analīzei - viss vienā vietā
            </p>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <span>🎯</span>
                    </div>
                    <h3>Mērķtiecīga Mācīšanās</h3>
                    <p>Personalizēti mācību ceļi, kas pielāgoti katram studentam individuāli, nodrošinot efektīvāku apgūšanas procesu.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <span>🤝</span>
                    </div>
                    <h3>Sadarbības Rīki</h3>
                    <p>Forumi, diskusiju grupas un kopīga darba telpas, kas veicina komunikāciju starp skolotājiem un studentiem.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <span>📈</span>
                    </div>
                    <h3>Detalizēta Analīze</h3>
                    <p>Vizuāli pārskati un statistika par studentu progresu, sniedzot skaidru priekšstatu par sasniegumiem.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-bg"></div>
            <h2 class="cta-title">Gatavs mainīt izglītību?</h2>
            <p class="cta-subtitle">
                Pievienojies tūkstošiem skolotāju un studentu, kuri jau izmanto Classroom platformu saviem mācību mērķiem.
            </p>
            <div class="button-group" style="justify-content: center;">
                <a href="{{ route('register.show') }}" class="cta-button" style="background: white; color: var(--primary);">
                    🚀 Sākt Bezmaksas
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="modern-footer">
            <p style="margin: 0; opacity: 0.8;">© {{ date('Y') }} Classroom. Visas tiesības aizsargātas.</p>
            <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.6;">
                Moderna izglītības platforma skolotājiem un studentiem
            </p>
        </footer>
    </div>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe feature items
        document.querySelectorAll('.feature-item, .stats-section, .cta-section').forEach(el => {
            observer.observe(el);
        });

        // Add hover sound effect (optional)
        document.querySelectorAll('.cta-button, .outline-button').forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.style.transform = button.classList.contains('cta-button') 
                    ? 'translateY(-3px)' 
                    : 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translateY(0)';
            });
        });
    </script>
</x-layout>