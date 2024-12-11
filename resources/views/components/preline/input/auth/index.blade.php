<div class="grid w-full transition-all">
	<div class="relative w-full transition-all">
		<input type="{{ $type }}"
		       name="{{ $name }}"
		       id="hs-floating-input-{{$name}}" class="transition-all h-14 peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-xl text-base placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-[#323644] dark:border-transparent dark:text-neutral-300 dark:focus:ring-blue-600 focus:ring-2
			    focus:pt-6
			    focus:pb-2
			    focus:dark:placeholder:text-neutral-500
			    [&:not(:placeholder-shown)]:pt-6
			    [&:not(:placeholder-shown)]:pb-2
			    autofill:pt-6
			    autofill:pb-2" placeholder="{{ $placeholder }}">
		<label for="hs-floating-input-{{$name}}" class="absolute top-0 start-0 p-4 ps-11 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
		      peer-focus:scale-[.8]
		      peer-focus:translate-x-2
		      peer-focus:-translate-y-1.5
		      peer-focus:text-gray-500 dark:peer-focus:text-blue-500
		      peer-[:not(:placeholder-shown)]:scale-[.8]
		      peer-[:not(:placeholder-shown)]:translate-x-2
		      peer-[:not(:placeholder-shown)]:-translate-y-1.5
		      peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-400 dark:text-neutral-400">{{ $label }}</label>
		<div class="h-14 absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
			@svg($icon, ['class' => 'size-5 text-gray-500 dark:text-neutral-400', 'stroke-width' => 2.6])
		</div>

	</div>
	@error($name)
	<p class="text-sm text-red-600 mt-1" id="hs-validation-name-error-helper">
		*{{ $message }}
	</p>
	@enderror
</div>
