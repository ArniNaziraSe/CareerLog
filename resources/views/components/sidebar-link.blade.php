@props([
    'href' => '#',
    'active' => false,
])

<a href="{{ $href }}"
   {{ $attributes->class([
        'flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition',
        'bg-blue-50 text-blue-700 border-l-4 border-blue-600' => $active,
        'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => ! $active,
   ]) }}>
    {{ $slot }}
</a>