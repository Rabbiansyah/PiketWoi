<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Dashboard - {{ ucfirst(Auth::user()->role) }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        {{-- Konten berdasarkan role --}}
        @php
            $role = Auth::user()->role;
        @endphp

        @if($role === 'admin')
            {{-- Konten untuk Admin --}}
            <div class="bg-red-100 p-4 rounded">
                <h3 class="font-bold text-lg">Admin Dashboard</h3>
                <p>Halo Admin! Kamu dapat mengelola user, sistem, dan laporan.</p>
            </div>

        @elseif($role === 'developer')
            {{-- Konten untuk Developer --}}
            <div class="bg-blue-100 p-4 rounded">
                <h3 class="font-bold text-lg">Developer Dashboard</h3>
                <p>Halo Developer! Kamu dapat melihat log, debugging, dan API.</p>
            </div>

        @elseif($role === 'user')
            {{-- Konten untuk User --}}
            <div class="bg-green-100 p-4 rounded">
                <h3 class="font-bold text-lg">User Dashboard</h3>
                <p>Selamat datang! Ini adalah halaman user biasa.</p>
            </div>
        @endif
    </div>
</x-app-layout>
