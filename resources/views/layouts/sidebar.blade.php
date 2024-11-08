<aside id="sidebar"
       class="fixed hidden z-20 h-full top-0 left-0 pt-16 lg:flex flex-shrink-0 flex-col w-80 transition-width duration-75"
       aria-label="Sidebar">
	@php
		$current = Route::current()->getName();
	@endphp
	<div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-700 pt-0">
		<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto no-scrollbar">
			<div class="flex-1 divide-y space-y-1">
				<x-accordion
						type="multiple"
						collapsible
						class="grid w-full gap-y-2">
					@foreach(config('sidebar') as $item)
						@if (isset($item['sub']))
							<x-accordion.item value="{{ $item['label'] }}"
							                  :current="in_array($current, array_column($item['sub'], 'route'))">
								<x-accordion.trigger class="!no-underline w-full">
									<div class="flex">
										@svg($item['icon'], ['class' => 'size-5 me-7', 'stroke-width' => 2.8])
										{{ $item['label'] }}
									</div>
								</x-accordion.trigger>
								<x-accordion.content>
									@foreach ($item['sub'] as $subItem)
										<x-button onclick="location.href='{{ route($subItem['route']) }}'"
										          class="{{$current === $subItem['route'] ? 'border-blue-600 border-l-[3px] rounded-r-lg rounded-l-none text-blue-600' : 'dark:text-gray-400 dark:hover:text-white rounded-lg'}} px-12 group flex w-full bg-transparent justify-start dark:hover:bg-white/5 font-medium capitalize tracking-wide font-maven shadow-none py-5 mb-1">
											<x-lucide-dot class="size-4 me-8" stroke-width="3"/>
											{{ $subItem['label'] }}
										</x-button>
									@endforeach
								</x-accordion.content>
							</x-accordion.item>
						@else
							<x-button onclick="location.href='{{ route($item['route']) }}'"
							          class="{{$current === $item['route'] ? 'border-blue-600 border-l-[3px] rounded-r-lg rounded-l-none text-blue-600' : 'dark:text-gray-400 dark:hover:text-white rounded-lg'}} px-12 group flex w-full bg-transparent justify-start dark:hover:bg-white/5 font-medium capitalize tracking-wide font-maven shadow-none py-5">
								@svg($item['icon'], ['class' => 'size-4 me-8 shrink-0', 'stroke-width' => 2.8])
								<span class="basis-full text-left">{{ $item['label'] }}</span>
							</x-button>
						@endif
					@endforeach
				</x-accordion>

			</div>
		</div>
	</div>
</aside>
