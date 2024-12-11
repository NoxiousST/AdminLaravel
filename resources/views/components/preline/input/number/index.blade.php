<!-- Input Number -->
<div class="py-3 px-4 bg-gray-100 rounded-lg dark:bg-background/50 w-full" data-hs-input-number="">
	<div class="w-full flex justify-between items-center gap-x-5">
		<div class="grow">
			<input id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
			       class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
			       style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="{{ $value }}"
			       data-hs-input-number-input="">
		</div>
		<div class="flex justify-end items-center gap-x-1.5">
			<button type="button"
			        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-background dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
			        tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
				<x-lucide-minus class="shrink-0 size-3.5"/>
			</button>
			<button type="button"
			        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-background dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
			        tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
				<x-lucide-plus class="shrink-0 size-3.5"/>
			</button>
		</div>
	</div>
</div>
