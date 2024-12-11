<nav class="z-50 dark:bg-accent/50 backdrop-blur-xl border-b border-gray-600 w-full">
	<div class="px-3 py-3 lg:px-5 lg:pl-3">
		<div class="flex items-center justify-between">
			<div class="flex items-center justify-start">
				<button aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-example" aria-label="Toggle navigation" data-hs-overlay="#hs-offcanvas-example"
				        class="lg:hidden mr-2 text-gray-600 text-primary-foreground cursor-pointer p-2 hover:bg-primary focus:bg-primary focus:ring-2 focus:ring-primary/50 rounded">
					<x-lucide-align-left class="size-6"/>
				</button>
			</div>

			<div class="flex items-center gap-x-4">
				<div class="max-w-sm">
					<!-- SearchBox -->
					<x-preline.searchbox :navbarItems="$navbarItems"/>
				</div>

				<x-preline.button type="button" id="theme-toggle" class="aspect-square size-12 p-0 !ring-0 bg-transparent" variant="icon">
					<x-lucide-sun class="size-5 hidden dark:block" stroke-width="2.8"/>
					<x-lucide-moon-star class="size-5 block dark:hidden" stroke-width="2.8"/>
				</x-preline.button>
			<x-preline.dropdown :items="$account" :is-logout="true">
				<x-preline.avatar/>
				<div class="dark:text-gray-300 font-lato font-bold text-sm hidden sm:block min-w-12 text-left">{{ Auth::user()->username }}</div>
			</x-preline.dropdown>
			</div>
		</div>
	</div>
</nav>
