<div class="relative sm:block hidden" data-hs-combo-box='{
	    "groupingType": "default",
	    "preventSelection": true,
	    "isOpenOnFocus": true,
	    "groupingTitleTemplate": "<div class=\"block text-xs text-gray-500 m-3 mb-1 dark:text-neutral-500 dark:border-neutral-700\"></div>"
	  }'>
	<div class="relative">
		<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
			<x-lucide-search class="size-4 text-gray-400 dark:text-white/60"/>
		</div>
		<input class="py-3 ps-10 pe-4 block sm:w-64 md:w-72 lg:w-96 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-accent dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-primary"
		       type="text" role="combobox" aria-expanded="false"
		       placeholder="Cari halaman atau data" value="" data-hs-combo-box-input="">
	</div>

	<!-- SearchBox Dropdown -->
	<div class="absolute !z-50 w-full bg-white rounded-xl dark:bg-accent/60 backdrop-blur-xl shadow-xl"
	     style="display: none;" data-hs-combo-box-output="">
		<div class="max-h-[300px] p-2 overflow-y-auto overflow-hidden [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
		     data-hs-combo-box-output-items-wrapper="">

			@foreach($navbarItems as $item)
				@if (isset($item['sub']))
					@foreach ($item['sub'] as $subItem)
						<div data-hs-combo-box-output-item='{"group": {"name": "halaman", "title": "Halaman"}}'
						     tabindex="0">
							<a class="py-2 px-3 flex items-center gap-x-3 hover:bg-gray-100 rounded-lg dark:hover:bg-background"
							   href="{{ route($subItem['route'] . '.index') }}">
								@svg($item['icon'], ['class' => 'shrink-0 size-4 text-gray-600 dark:text-neutral-500', 'stroke-width' => 2.6])
								<span class="text-sm text-gray-800 dark:text-neutral-200"
								      data-hs-combo-box-search-text="{{ $subItem['label'] }}"
								      data-hs-combo-box-value="">{{ $subItem['label'] }}</span>
								<span class="ms-auto text-xs text-gray-400 dark:text-neutral-500"
								      data-hs-combo-box-search-text="{{ $subItem['route'] }}.index"
								      data-hs-combo-box-value="">{{ $subItem['route'] }}.index</span>
							</a>
						</div>
					@endforeach
				@else
					<div data-hs-combo-box-output-item='{"group": {"name": "halaman", "title": "Halaman"}}'
					     tabindex="0">
						<a class="py-2 px-3 flex items-center gap-x-3 hover:bg-gray-100 rounded-lg dark:hover:bg-background"
						   href="{{ route($item['route'] . '.index') }}">
							@svg($item['icon'], ['class' => 'shrink-0 size-4 text-gray-600 dark:text-neutral-500', 'stroke-width' => 2.6])
							<span class="text-sm text-gray-800 dark:text-neutral-200"
							      data-hs-combo-box-search-text="{{ $item['label'] }}"
							      data-hs-combo-box-value="">{{ $item['label'] }}</span>
							<span class="ms-auto text-xs text-gray-400 dark:text-neutral-500"
							      data-hs-combo-box-search-text="{{ $item['route'] }}.index"
							      data-hs-combo-box-value="">{{ $item['route'] }}.index</span>
						</a>
					</div>
				@endif

			@endforeach

		</div>
	</div>
	<!-- End SearchBox Dropdown -->
</div>
<!-- End SearchBox -->
