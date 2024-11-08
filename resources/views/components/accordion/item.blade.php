@props(['value', 'current'])

<div
    x-accordion:item
    class="{{ $current ? 'bg-[radial-gradient(circle_300px_at_top_left,_#2563eb44,_#13152100)]' : 'data-[state=open]:bg-white/5' }}"
    x-data="{ item: '{{ $value }}' }"
    :data-state="__getDataState(item)"
>
    {{ $slot }}
</div>
