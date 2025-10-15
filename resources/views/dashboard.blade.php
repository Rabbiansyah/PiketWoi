<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Dashboard - {{ ucfirst(Auth::user()->role) }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        @php
            $role = Auth::user()->role;
        @endphp

        @if($role === 'admin')
            @include('dashboard.admin')
        @elseif($role === 'developer')
            @include('dashboard.developer')
        @elseif($role === 'user')
            @include('dashboard.user')
        @else
            <p class="text-red-500">Role tidak dikenali.</p>
        @endif
    </div>
</x-app-layout>
