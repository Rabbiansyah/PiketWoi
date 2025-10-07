<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">
            <i class="fas fa-sign-in-alt text-blue-600 dark:text-blue-400 mr-2"></i>
            Masuk ke Akun
        </h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">Silakan masuk untuk mengakses sistem piket sekolah</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-5">
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                <i class="fas fa-envelope text-blue-500 dark:text-blue-400 mr-2"></i>
                Email
            </label>
            <div class="relative">
                <input wire:model="form.email" 
                       id="email" 
                       type="email" 
                       name="email" 
                       required 
                       autofocus 
                       autocomplete="username"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-blue-500 dark:focus:border-blue-400 transition-all duration-200 bg-white/80 dark:bg-gray-700/80 backdrop-blur-sm text-gray-900 dark:text-gray-100"
                       placeholder="Masukkan email Anda">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400 dark:text-gray-500"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                <i class="fas fa-lock text-green-500 dark:text-green-400 mr-2"></i>
                Password
            </label>
            <div class="relative">
                <input wire:model="form.password" 
                       id="password" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="current-password"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:border-green-500 dark:focus:border-green-400 transition-all duration-200 bg-white/80 dark:bg-gray-700/80 backdrop-blur-sm text-gray-900 dark:text-gray-100"
                       placeholder="Masukkan password Anda">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400 dark:text-gray-500"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember" class="flex items-center cursor-pointer">
                <input wire:model="form.remember" 
                       id="remember" 
                       type="checkbox" 
                       class="w-4 h-4 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-2" 
                       name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
            </label>
            
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition-colors duration-200" 
                   href="{{ route('password.request') }}" 
                   wire:navigate>
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-500 dark:to-blue-600 hover:from-blue-700 hover:to-blue-800 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 shadow-lg">
            <i class="fas fa-sign-in-alt mr-2"></i>
            Masuk
        </button>

        <!-- Information Box -->
        <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/30 rounded-xl border border-blue-200 dark:border-blue-700/50">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 mt-0.5">
                    <i class="fas fa-info-circle text-blue-500 dark:text-blue-400"></i>
                </div>
                <div class="text-sm text-blue-700 dark:text-blue-300">
                    <p class="font-medium mb-1">Butuh Akun Baru?</p>
                    <p>Untuk membuat akun admin baru, silakan hubungi developer sistem. Hanya administrator yang dapat membuat akun pengguna baru.</p>
                </div>
            </div>
        </div>
    </form>
</div>
