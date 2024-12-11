@props([
    'name',
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
])

<div class="relative w-full">
	<input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ $value }}"
	       placeholder="{{ $placeholder }}"
	       {{ $attributes->twMerge('peer py-3 px-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-background/50 dark:border-transparent dark:text-neutral-200 dark:placeholder-indigo-100/45 dark:focus:ring-primary') }}">
	<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
		{{ $slot }}
	</div>
</div>
