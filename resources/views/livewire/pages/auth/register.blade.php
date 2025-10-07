<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-plus text-green-600 mr-2"></i>
            Daftar Akun Baru
        </h2>
        <p class="text-gray-600 text-sm">Bergabunglah dengan sistem piket sekolah</p>
    </div>

    <form wire:submit="register" class="space-y-5">
        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="flex items-center text-sm font-medium text-gray-700">
                <i class="fas fa-user text-purple-500 mr-2"></i>
                Nama Lengkap
            </label>
            <div class="relative">
                <input wire:model="name" 
                       id="name" 
                       type="text" 
                       name="name" 
                       required 
                       autofocus 
                       autocomplete="name"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                       placeholder="Masukkan nama lengkap Anda">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="flex items-center text-sm font-medium text-gray-700">
                <i class="fas fa-envelope text-blue-500 mr-2"></i>
                Email
            </label>
            <div class="relative">
                <input wire:model="email" 
                       id="email" 
                       type="email" 
                       name="email" 
                       required 
                       autocomplete="username"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                       placeholder="Masukkan email Anda">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="flex items-center text-sm font-medium text-gray-700">
                <i class="fas fa-lock text-green-500 mr-2"></i>
                Password
            </label>
            <div class="relative">
                <input wire:model="password" 
                       id="password" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="new-password"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                       placeholder="Buat password yang kuat">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="flex items-center text-sm font-medium text-gray-700">
                <i class="fas fa-shield-alt text-yellow-500 mr-2"></i>
                Konfirmasi Password
            </label>
            <div class="relative">
                <input wire:model="password_confirmation" 
                       id="password_confirmation" 
                       type="password" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                       placeholder="Ulangi password Anda">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-shield-alt text-gray-400"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-xl border border-blue-200">
            <div class="flex-shrink-0 mt-0.5">
                <i class="fas fa-info-circle text-blue-500"></i>
            </div>
            <div class="text-sm text-blue-700">
                <p class="font-medium mb-1">Informasi Penting:</p>
                <p>Dengan mendaftar, Anda setuju untuk menggunakan sistem ini sesuai dengan aturan sekolah dan kebijakan yang berlaku.</p>
            </div>
        </div>

        <!-- Register Button -->
        <button type="submit" 
                class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-lg">
            <i class="fas fa-user-plus mr-2"></i>
            Daftar Sekarang
        </button>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">atau</span>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" 
                   wire:navigate
                   class="font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                    <i class="fas fa-sign-in-alt mr-1"></i>
                    Masuk sekarang
                </a>
            </p>
        </div>
    </form>
</div>
