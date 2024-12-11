@props([
    'name',
    'data' => null,
    'route' => ''
])

<div class="flex w-full items-center justify-center gap-4">
	<div id="clearButtonContainer{{ $name }}" class="relative group {{ $data ? 'block' : 'hidden' }}">
		<img id="preview{{ $name }}"
		     class="rounded-lg object-cover size-40"
		     src="{{ $data ? Storage::url('public/' . $route . '/' . $data) : '#' }}"
		     alt="Preview File" loading="lazy"/>

		<!-- Delete button -->
		<button type="button" onclick="clearImageInput('{{ $name }}')"
		        class="flex justify-center items-center group-hover:backdrop-blur-sm backdrop-blur-none transition-all text-red-500 absolute top-0 left-0 w-full h-full bg-transparent group-hover:bg-[#131521]/50 rounded-lg">
			<x-lucide-x
					class="opacity-0 group-hover:opacity-100 transition-all size-16 text-rose-600 drop-shadow-[0_6px_10px_rgba(190,18,60,1)]"
					stroke-width="2.8"/>
		</button>

		<!-- Checkbox to delete the image -->
		<input type="checkbox" name="delete_{{ $name }}" value="1" class="hidden" id="delete_{{ $name }}"/>
	</div>

	<!-- Upload section -->
	<label for="{{ $name }}"
	       class="shrink group dark:bg-accent dark:hover:bg-accent/75 transition-all text-gray-500 hover:text-gray-400 backdrop-blur-lg flex flex-col items-center justify-center w-full h-44 border-2 dark:border-gray-700 dark:hover:border-primary border-dashed rounded-lg cursor-pointer">
		<div class="flex flex-col items-center justify-center pt-5 pb-6">
			<x-lucide-upload-cloud class="size-10 transition-colors"/>
			<p class="mb-2 text-sm transition-colors">
				<span class="font-semibold">Click to upload</span> or drag and drop
			</p>
			<p class="text-xs transition-colors">
				SVG, PNG, JPG or GIF (MAX. 800x400px)
			</p>
		</div>
		<input id="{{ $name }}" name="{{ $name }}"
		       onchange="previewImage(event, '{{ $name }}')" type="file"
		       class="hidden"/>
	</label>
</div>
