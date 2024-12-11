<button type="{{ $type }}"
		{{ $attributes->twMerge('py-3 px-4 inline-flex w-24 justify-center items-center gap-x-2 text-sm font-medium font-rubik uppercase tracking-widest rounded-lg border border-transparent bg-primary ring-primary/50 text-white hover:ring-4 disabled:opacity-50 disabled:pointer-events-none dark:text-primary-foreground transition-all') }}>
	{{ $slot }}
</button>
