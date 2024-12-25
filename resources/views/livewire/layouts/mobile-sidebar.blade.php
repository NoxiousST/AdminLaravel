<!-- Sidebar -->
<div id="hs-offcanvas-example"
     class="!py-6 hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-80 bg-accent dark:bg-accent/50 backdrop-blur-xl border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700"
     role="dialog" tabindex="-1" aria-label="Sidebar">
	@php
		$current = Route::current()->getName();
	@endphp
	<div class="relative flex-1 flex flex-col min-h-0 pt-0">
		<a href="#" class="text-foreground text-xl font-bold flex items-center ml-8 mb-4">
			<img src="{{ asset('img/kominfo.png') }}" class="size-8 mr-4"
			     alt="Dinkominfo Logo">
			<span class="self-center whitespace-nowrap font-gilroy">Dinkomifo</span>
		</a>
		<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto no-scrollbar">
			<div class="flex-1 space-y-1">
				<div class="grid w-full gap-y-2">

					@foreach($sidebarItems  as $item)
						@if (isset($item['sub']))
							<div class="{{ in_array($current, array_column($item['sub'], 'route')) ? 'bg-indigo-500/10' : '' }} hs-collapse-open:bg-white/5 rounded-lg">
								{{-- Collapse Trigger --}}
								<button type="button"
								        class="hs-collapse-toggle inline-flex items-center whitespace-nowrap text-sm transition-colors rounded-lg pl-10 pr-3 w-full text-gray-400 hover:text-white group bg-transparent justify-start dark:hover:bg-white/5 font-medium capitalize tracking-wide font-maven shadow-none py-3"
								        id="hs-m-basic-collapse" aria-expanded="false"
								        aria-controls="hs-m-basic-collapse-{{ $item['label'] }}"
								        data-hs-collapse="#hs-m-basic-collapse-{{ $item['label'] }}">
									@svg($item['icon'], ['class' => 'size-5 me-8 shrink-0', 'stroke-width' => 2.8])
									<span class="basis-full text-left grow">{{ $item['label'] }}</span>
									<div class="py-1.5 px-2">
										<x-lucide-chevron-down
												class="hs-collapse-open:rotate-180 transition-transform shrink-0 size-4"
												stroke-width="2.8"/>
									</div>
								</button>

								{{-- Collapse Content --}}
								<div id="hs-m-basic-collapse-{{ $item['label'] }}"
								     class="hs-collapse rounded-lg hidden w-full overflow-hidden transition-[height] duration-300"
								     aria-labelledby="hs-basic-collapse">
									@foreach ($item['sub'] as $subItem)
										<div class="flex flex-row-reverse h-12 gap-6">
											<a href="{{ route($subItem['route'] . '.index') }}" wire:navigate size="lg"
											   class="{{ request()->routeIs($subItem['route']) ? '!bg-indigo-500 text-white' : 'dark:text-gray-400 dark:hover:text-white rounded-lg'}} peer inline-flex items-center whitespace-nowrap text-sm transition-colors rounded-lg pl-4 pr-3 w-full bg-transparent justify-start dark:hover:bg-white/5 font-medium capitalize tracking-wide font-maven shadow-none py-6">
												<span class="basis-full text-left">{{ $subItem['label'] }}</span>
												<span class="{{ request()->routeIs($subItem['route']) ? 'bg-black dark:bg-indigo-100 text-indigo-500 font-bold' : 'bg-indigo-600 dark:bg-indigo-500/15 text-indigo-400' }} inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-xs font-medium">{{ $dataCounts[$subItem['route']] }}</span>
											</a>
											<div class="{{ $current === $subItem['route'] ? 'bg-indigo-500' : 'bg-white/45 peer-hover:bg-white'}} ms-12 w-[3px] h-full rounded-full"></div>
										</div>
									@endforeach
								</div>
							</div>
						@else
							<a href="{{ route($item['route'] . '.index') }}" wire:navigate
							   class="{{ request()->routeIs($item['route']) ? '!bg-indigo-500 text-white' : 'dark:text-gray-400 dark:hover:text-white'}} inline-flex items-center whitespace-nowrap text-sm transition-colors rounded-lg pl-10 pr-3 group w-full bg-transparent justify-start dark:hover:bg-white/5 font-medium capitalize tracking-wide font-maven shadow-none py-3">
								@svg($item['icon'], ['class' => 'size-5 me-8 shrink-0', 'stroke-width' => 2.8])
								<span class="basis-full text-left">{{ $item['label'] }}</span>
								<span class="{{ request()->routeIs($item['route']) ? 'bg-black dark:bg-indigo-100 text-indigo-500 font-bold' : 'bg-indigo-600 text-white dark:bg-indigo-500' }} inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-xs font-medium">{{ $dataCounts[$item['route']] }}</span>
							</a>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Sidebar -->
