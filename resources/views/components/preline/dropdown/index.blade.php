<div class="hs-dropdown relative inline-flex">
	<button id="hs-dropdown-default" type="button"
	        class="hs-dropdown-toggle bg-white/10 dark:hover:bg-background/50 p-1 pe-2 inline-flex items-center gap-x-2 rounded-full text-sm font-medium border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-accent dark:border-neutral-700 dark:text-white dark:focus:bg-background/50"
	        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
		{{ $slot }}
		<x-lucide-chevron-down class="hs-dropdown-open:rotate-180 size-4 transition-all"/>
	</button>

	<div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-48 bg-accent shadow-md rounded-lg mt-2 dark:bg-accent dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
	     role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
		<div class="p-1 space-y-0.5">
			@foreach($items as $item)
				<x-preline.button.link :route="route($item['route'])">
					{{ $item['label'] }}
				</x-preline.button.link>
			@endforeach
			@if($isLogout)
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<button type="submit"
					        class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-background dark:hover:text-neutral-300 dark:focus:bg-background">
						Logout
					</button>
				</form>
			@endif

		</div>
	</div>
</div>
