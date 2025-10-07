<nav class="flex items-center space-x-4">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium transition-colors"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium transition-colors"
        >
            Masuk
        </a>

        <span class="px-4 py-2 text-gray-500 text-sm">
            <i class="fas fa-info-circle mr-1"></i>
            Hubungi Developer untuk Akun Baru
        </span>
    @endauth
</nav>
