<nav class=" dark:bg-[radial-gradient(circle_300px_at_top_left,_#2563eb44,_#13152144)] backdrop-blur-xl border-b border-gray-600 fixed z-30 w-full">
	<div class="px-3 py-3 lg:px-5 lg:pl-3">
		<div class="flex items-center justify-between">
			<div class="flex items-center justify-start">
				<button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
				        class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
					<svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					     xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
						      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						      clip-rule="evenodd"></path>
					</svg>
					<svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"
					     xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
						      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						      clip-rule="evenodd"></path>
					</svg>
				</button>
				<a href="https://demo.themesberg.com/windster/" class="text-xl font-bold flex items-center lg:ml-6">
					<img src="{{ asset('img/dinkominfo-v2.png') }}" class="size-8 mr-2"
					     alt="Dinkominfo Logo">
					<span class="self-center whitespace-nowrap">Dinkomifo</span>
				</a>
			</div>
			<div class="flex items-center">
				<x-form.item>
					<x-form.label for="indexSearch" class="sr-only"></x-form.label>
					<div class="relative w-full hidden sm:block">
						<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
							<x-lucide-search class="size-4 text-gray-400"/>
						</div>
						<x-input id="indexSearch" name="indexSearch"
						         class="ps-10 placeholder:text-gray-400 bg-slate-50 dark:bg-transparent dark:border-gray-600 rounded-full focus-visible:bg-slate-100 dark:focus-visible:bg-[#131521]/20"
						         x-form:control placeholder="Cari data..."/>
					</div>
				</x-form.item>
				<x-button id="theme-toggle" class="" variant="icon">
					<x-lucide-sun class="size-5 hidden dark:block" stroke-width="2.8"/>
					<x-lucide-moon-star class="size-5 block dark:hidden" stroke-width="2.8"/>
				</x-button>
				<x-dropdown-menu>
					<x-dropdown-menu.trigger class="bg-white/10 dark:hover:bg-blue-600 rounded-full p-0">
						<div class="flex gap-2 items-center p-1 rounded-full">
							<img src="https://github.com/shadcn.png" alt="admin" class="rounded-full !size-8">
							<div class="dark:text-gray-300 font-lato font-bold text-sm hidden sm:block">Admin</div>
							<x-lucide-chevron-down class="size-5 text-white mr-1 hidden sm:block" storke-width="3"/>
						</div>
					</x-dropdown-menu.trigger>
					<x-dropdown-menu.content align="end" class="w-44">
						<x-dropdown-menu.label>My Account</x-dropdown-menu.label>
						<x-dropdown-menu.separator/>
						<x-dropdown-menu.item>Profile</x-dropdown-menu.item>
						<x-dropdown-menu.item>Billing</x-dropdown-menu.item>
						<x-dropdown-menu.item>Team</x-dropdown-menu.item>
						<x-dropdown-menu.item>Subscription</x-dropdown-menu.item>
					</x-dropdown-menu.content>
				</x-dropdown-menu>
			</div>
		</div>
	</div>
</nav>
