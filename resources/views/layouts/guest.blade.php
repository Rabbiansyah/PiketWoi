<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PiketWoi') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            
            .auth-background {
                background: url('{{ asset("assets/auth-background.jpg") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: relative;
            }
            
            .auth-background::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(
                    135deg,
                    rgba(59, 130, 246, 0.8) 0%,
                    rgba(147, 51, 234, 0.7) 50%,
                    rgba(79, 70, 229, 0.8) 100%
                );
                backdrop-filter: blur(2px);
                -webkit-backdrop-filter: blur(2px);
            }
            
            .dark .auth-background::before {
                background: linear-gradient(
                    135deg,
                    rgba(17, 24, 39, 0.9) 0%,
                    rgba(55, 65, 81, 0.8) 50%,
                    rgba(31, 41, 55, 0.9) 100%
                );
                backdrop-filter: blur(3px);
                -webkit-backdrop-filter: blur(3px);
            }
            
            .glass-effect {
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                background: rgba(255, 255, 255, 0.95);
                border: 1px solid rgba(255, 255, 255, 0.3);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            }
            
            .dark .glass-effect {
                background: rgba(31, 41, 55, 0.95);
                border: 1px solid rgba(75, 85, 99, 0.3);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
            }
            
            .text-with-glow {
                text-shadow: 
                    0 0 10px rgba(255, 255, 255, 0.8),
                    0 2px 4px rgba(0, 0, 0, 0.5);
            }
            
            .dark .text-with-glow {
                text-shadow: 
                    0 0 15px rgba(59, 130, 246, 0.6),
                    0 2px 4px rgba(0, 0, 0, 0.8);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300">
        <!-- Dark mode toggle (top right) -->
        <div class="fixed top-4 right-4 z-50">
            <x-dark-mode-toggle />
        </div>
        
        <!-- Auth Background -->
        <div class="min-h-screen auth-background flex flex-col justify-center items-center relative">
            
            <!-- Subtle decorative elements -->
            <div class="absolute top-10 left-10 w-12 h-12 bg-white/20 dark:bg-blue-400/20 rounded-full blur-sm"></div>
            <div class="absolute top-32 right-20 w-8 h-8 bg-white/15 dark:bg-purple-400/15 rounded-full blur-sm"></div>
            <div class="absolute bottom-20 left-20 w-16 h-16 bg-white/25 dark:bg-indigo-400/25 rounded-full blur-sm"></div>
            <div class="absolute bottom-32 right-10 w-6 h-6 bg-white/20 dark:bg-blue-300/20 rounded-full blur-sm"></div>
            
            <!-- Main content container -->
            <div class="w-full max-w-md mx-auto px-6">
                
                <!-- Logo section -->
                <div class="text-center mb-8 relative z-10">
                    <div class="inline-block p-4 bg-white dark:bg-gray-800 rounded-full shadow-lg mb-4 transition-colors duration-300">
                        <img src="{{ asset('assets/logo.png') }}" alt="PiketWoi Logo" class="w-16 h-16 object-contain">
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2 text-with-glow">PiketWoi</h1>
                    <p class="text-white text-sm font-medium text-with-glow">Sistem Manajemen Piket Sekolah</p>
                </div>

                <!-- Auth form container -->
                <div class="glass-effect rounded-2xl shadow-lg p-8 transition-all duration-300 relative z-10">
                    {{ $slot }}
                </div>
                
                <!-- Footer -->
                <div class="text-center mt-6 relative z-10">
                    <p class="text-white text-xs font-medium text-with-glow">
                        © {{ date('Y') }} PiketWoi. Dibuat untuk kemudahan manajemen piket sekolah.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
