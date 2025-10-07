<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PiketWoi - Sistem Manajemen Piket Sekolah</title>
    <meta name="description" content="Sistem manajemen piket sekolah modern yang memudahkan pengaturan jadwal piket, monitoring kehadiran, dan koordinasi tugas piket harian.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="icon" href="{{ asset('logo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }

        .wave-decoration {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-decoration svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 60px;
        }
    </style>
</head>

<body class="antialiased font-sans">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('logo.png') }}" alt="PiketWoi" class="h-10 w-10 object-contain">
                    <span class="text-xl font-bold text-gray-800">PiketWoi</span>
                </div>

                <!-- Navigation Links -->
                @if (Route::has('login'))
                <livewire:welcome.navigation />
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen hero-bg flex items-center">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pt-16">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Laporan Piket Sekolah Jadi
                        <span class="text-blue-600">Gampang Banget!</span>
                    </h1>

                    <p class="text-lg text-gray-700 mb-8">
                        Udah capek ngatur jadwal piket manual? PiketWoi hadir buat ngebantu kamu kelola piket sekolah dengan lebih praktis.
                        Dari jadwal sampai laporan, semua bisa diatur dengan mudah!
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                        @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                            Buka Dashboard
                        </a>
                        @else
                        <div class="relative">
                            <a href="{{ route('login') }}"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                Hubungi Admin
                            </a>

                            <span class="px-4 py-1 text-gray-500 text-sm">
                                <i class="fas fa-info-circle mr-1"></i>
                                Hubungi Developer untuk Akun Baru
                            </span>
                        </div>
                        @endauth
                    </div>

                    <!-- Simple stats -->
                    <div class="flex flex-wrap gap-6 mt-10 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            Gratis untuk sekolah
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            Setup dalam 5 menit
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                            Bisa diakses dari HP
                        </div>
                    </div>
                </div>

                <!-- Hero Image/Illustration -->
                <div class="relative">
                    <div>
                        <img src="{{ asset('hero.png') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white" id="about">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">
                    Kenapa Harus PiketWoi?
                </h2>
                <p class="text-gray-600">
                    Karena ngatur piket sekolah nggak harus ribet!
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="p-6 card-hover">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Gampang!</h3>
                    <p class="text-gray-600 text-sm">
                        Tinggal upload bukti piket, semua beres!
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 card-hover">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mudah dimonitor</h3>
                    <p class="text-gray-600 text-sm">
                        Admin dapat dengan mudah mencatat data orang yang piket atau tidak.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 card-hover">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Akses dari HP</h3>
                    <p class="text-gray-600 text-sm">
                        Bisa diakses dari HP kapan aja, dimana aja. Mau cek jadwal atau laporan, tinggal buka browser!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <img src="{{ asset('logo.png') }}" alt="PiketWoi" class="h-8 w-8 object-contain">
                    <span class="text-xl font-bold text-gray-800">PiketWoi</span>
                </div>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">
                    Laporan piket sekolah jadi lebih mudah dan terorganisir. Gratis untuk semua sekolah di Indonesia!
                </p>
                <div class="flex justify-center space-x-6 text-sm text-gray-500 mb-6">
                    <a href="#about" class="hover:text-gray-700">Tentang</a>
                    <a href="#" class="hover:text-gray-700">Bantuan</a>
                    <a href="#" class="hover:text-gray-700">Kontak</a>
                </div>
                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} PiketWoi. Dibuat dengan ❤️ untuk sekolah Indonesia.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>