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
            .school-pattern {
                background-image: 
                    radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(245, 158, 11, 0.1) 0%, transparent 50%);
            }
            .glass-effect {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.95);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Background with school pattern -->
        <div class="min-h-screen school-pattern bg-gradient-to-br from-blue-50 via-green-50 to-yellow-50 flex flex-col justify-center items-center relative overflow-hidden">
            
            <!-- Decorative elements -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200 rounded-full opacity-20 animate-pulse"></div>
            <div class="absolute top-32 right-20 w-16 h-16 bg-green-200 rounded-full opacity-20 animate-pulse delay-1000"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-yellow-200 rounded-full opacity-20 animate-pulse delay-2000"></div>
            <div class="absolute bottom-32 right-10 w-12 h-12 bg-purple-200 rounded-full opacity-20 animate-pulse delay-500"></div>
            
            <!-- Floating school icons -->
            <div class="absolute top-20 right-1/4 text-blue-300 opacity-30 animate-bounce">
                <i class="fas fa-graduation-cap text-2xl"></i>
            </div>
            <div class="absolute bottom-40 left-1/4 text-green-300 opacity-30 animate-bounce delay-1000">
                <i class="fas fa-book text-xl"></i>
            </div>
            <div class="absolute top-1/3 left-10 text-yellow-300 opacity-30 animate-bounce delay-2000">
                <i class="fas fa-pencil-alt text-lg"></i>
            </div>
            
            <!-- Main content container -->
            <div class="w-full max-w-md mx-auto px-6">
                
                <!-- Logo section -->
                <div class="text-center mb-8">
                    <div class="inline-block p-4 bg-white rounded-full shadow-lg mb-4">
                        <img src="{{ asset('logo.png') }}" alt="PiketWoi Logo" class="w-16 h-16 object-contain">
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">PiketWoi</h1>
                    <p class="text-gray-600 text-sm">Sistem Manajemen Piket Sekolah</p>
                </div>

                <!-- Auth form container -->
                <div class="glass-effect rounded-2xl shadow-xl p-8 border border-white/20">
                    {{ $slot }}
                </div>
                
                <!-- Footer -->
                <div class="text-center mt-6">
                    <p class="text-gray-500 text-xs">
                        © {{ date('Y') }} PiketWoi. Dibuat untuk kemudahan manajemen piket sekolah.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
