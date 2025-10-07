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

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
            >
                Daftar
            </a>
        @endif
    @endauth
</nav>
