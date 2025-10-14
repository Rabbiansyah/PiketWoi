@props(['label' => 'Back'])

<a href = "{{ route('welcome') }}"
   wire:navigate
   class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 
          hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700/50 
          rounded-full transition-all duration-200 shadow-sm">
    <i class="fa-solid fa-arrow-left"></i>
    <span>{{ $label }}</span>
</a>
