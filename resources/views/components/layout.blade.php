<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'App') }}</title>
    
    <!-- Remove this if not using app.css -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    
    @stack('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        
        /* ORANGE THEME CSS - PASTE ALL THE CSS I GAVE YOU HERE */
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
            --light: #fed7aa;
            --text-light: #fff7ed;
            --text-dark: #7c2d12;
            --card-bg: rgba(255, 255, 255, 0.15);
            --card-border: rgba(251, 146, 60, 0.3);
        }
        
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        /* PASTE THE REST OF THE ORANGE THEME CSS HERE */
    </style>
</head>
<body>
    <main>
        {{ $slot }}
    </main>
</body>
</html>