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
                font-family: 'Inter', 'Poppins', sans-serif;
                font-feature-settings: 'cv02', 'cv03', 'cv04', 'cv11';
            }
            
            .auth-container {
                background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
                min-height: 100vh;
            }
            
            .dark .auth-container {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            }
            
            .illustration-float {
                animation: float-gentle 6s ease-in-out infinite;
            }
            
            @keyframes float-gentle {
                0%, 100% { transform: translateY(0px) scale(1); }
                50% { transform: translateY(-15px) scale(1.02); }
            }
            
            .form-container {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .dark .form-container {
                background: rgba(15, 23, 42, 0.8);
                border: 1px solid rgba(51, 65, 85, 0.3);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300">
        <!-- Dark mode toggle -->
        <div class="fixed top-6 right-6 z-50">
            <x-dark-mode-toggle />
        </div>
        
        <!-- Main Container -->
        <div class="auth-container">
            <div class="grid lg:grid-cols-2 min-h-screen">
                
                <!-- Left Side - Illustration & Branding -->
                <div class="hidden lg:flex flex-col justify-center items-center p-8 bg-gradient-to-br from-cyan-400 via-blue-400 to-blue-500 relative overflow-hidden">
                    
                    <!-- Background decorative elements -->
                    <div class="absolute top-10 left-10 w-4 h-4 bg-white/20 rounded-full"></div>
                    <div class="absolute top-20 right-16 w-2 h-2 bg-white/30 rounded-full"></div>
                    <div class="absolute bottom-32 left-16 w-3 h-3 bg-white/25 rounded-full"></div>
                    <div class="absolute top-1/3 left-1/4 w-6 h-6 bg-white/15 rounded-full"></div>
                    
                    <!-- Stars -->
                    <div class="absolute top-16 left-20 text-white/40 text-2xl">✦</div>
                    <div class="absolute top-40 right-20 text-white/30 text-lg">✦</div>
                    <div class="absolute bottom-40 left-12 text-white/35 text-xl">✦</div>
                    
                    <!-- Large decorative circle -->
                    <div class="absolute top-1/4 right-1/4 w-32 h-32 bg-white/10 rounded-full"></div>
                    
                    <!-- Branding -->
                    <div class="relative z-10 text-center mb-8">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/logo.png') }}" alt="PiketWoi Logo" class="w-12 h-12 object-contain mr-3">
                            <div class="text-left">
                                <h1 class="text-2xl font-bold text-white">
                                    PiketWoi
                                </h1>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Illustration -->
                    <div class="relative max-w-sm w-full z-10">
                        <img src="{{ asset('assets/cleaning-icon.png') }}" alt="Cleaning Activities" class="w-full h-auto object-contain illustration-float">
                    </div>
                </div>
                
                <!-- Right Side - Login Form -->
                <div class="flex flex-col justify-center px-8 py-8 lg:px-12">
                    
                    <!-- Mobile Branding -->
                    <div class="lg:hidden text-center mb-6">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/logo.png') }}" alt="PiketWoi Logo" class="w-12 h-12 object-contain mr-3">
                            <div>
                                <h1 class="text-xl font-bold text-slate-800 dark:text-white">PiketWoi</h1>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Container -->
                    <div class="w-full max-w-sm mx-auto">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
