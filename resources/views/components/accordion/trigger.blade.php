<h3
	x-accordion:trigger
	class="flex"
	@click="__toggle(item)"
	:data-state="__getDataState(item)"
>
	<button
		:data-state="__getDataState(item)"
		class="px-12 border-none flex flex-1 text-gray-400 hover:bg-white/5 hover:!text-white items-center justify-between py-3 text-sm font-medium font-maven transition-all [&>svg]:data-[state=open]:rotate-180 rounded-lg"
	>
		{{ $slot }}
		<x-lucide-chevron-down class="size-4 transition-all" stroke-width="3"/>
	</button>
</h3>
