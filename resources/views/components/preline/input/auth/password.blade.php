<div class="grid">
	<div class="relative flex-1">
		<input type="{{ $type }}"
		       name="{{ $name }}"
		       id="hs-floating-input-{{$name}}" class="h-14 peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-xl text-base placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-[#323644] dark:border-transparent dark:text-neutral-300 dark:focus:ring-blue-600 focus:ring-2
				    focus:pt-6
				    focus:pb-2
				    focus:dark:placeholder:text-neutral-500
				    [&:not(:placeholder-shown)]:pt-6
				    [&:not(:placeholder-shown)]:pb-2
				    autofill:pt-6
				    autofill:pb-2"
		       placeholder="{{ $placeholder }}">
		<label for="hs-floating-input-{{$name}}" class="absolute top-0 start-0 p-4 ps-11 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
					peer-focus:scale-[.8]
					peer-focus:translate-x-2
					peer-focus:-translate-y-1.5
					peer-focus:text-gray-500 dark:peer-focus:text-blue-500
					peer-[:not(:placeholder-shown)]:scale-[.8]
					peer-[:not(:placeholder-shown)]:translate-x-2
					peer-[:not(:placeholder-shown)]:-translate-y-1.5
					peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-400 dark:text-neutral-400">
			{{ $label }}
		</label>
		<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
			@svg($icon, ['class' => 'size-5 text-gray-500 dark:text-neutral-400', 'stroke-width' => 2.6])
		</div>

		{{-- Toggle Password --}}
		<button type="button" data-hs-toggle-password='{
			        "target": "#hs-floating-input-{{$name}}"
			      }'
		        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
			<svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
			     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
				<path class="hs-password-active:hidden"
				      d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
				<path class="hs-password-active:hidden"
				      d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
				<line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
				<path class="hidden hs-password-active:block"
				      d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
				<circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
			</svg>
		</button>
		{{-- End of Toggle Password --}}

		{{-- Strong Password--}}
		<div id="hs-strong-password-popover"
		     class="hidden absolute z-10 w-full bg-white shadow-md rounded-lg p-4 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700">
			<div id="hs-strong-password-in-popover" data-hs-strong-password='{
			            "target": "#hs-floating-input-{{$name}}",
			            "hints": "#hs-strong-password-popover",
			            "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
			            "mode": "popover",
			            "checksExclude": ["special-characters"]
			          }' class="flex mt-2 -mx-1">
			</div>

			<h4 class="mt-3 text-sm font-semibold text-gray-800 dark:text-white">
				Password Anda harus berisi:
			</h4>

			<ul class="space-y-1 text-sm text-gray-500 dark:text-neutral-500">
				<li data-hs-strong-password-hints-rule-text="min-length"
				    class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
						<span class="hidden" data-check="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
						</span>
					<span data-uncheck="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
						</span>
					Jumlah minimum karakter adalah 6.
				</li>
				<li data-hs-strong-password-hints-rule-text="lowercase"
				    class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
						<span class="hidden" data-check="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
						</span>
					<span data-uncheck="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
						</span>
					Harus mengandung huruf kecil.
				</li>
				<li data-hs-strong-password-hints-rule-text="uppercase"
				    class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
						<span class="hidden" data-check="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
						</span>
					<span data-uncheck="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
						</span>
					Harus mengandung huruf besar.
				</li>
				<li data-hs-strong-password-hints-rule-text="numbers"
				    class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
						<span class="hidden" data-check="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
						</span>
					<span data-uncheck="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
						</span>
					Harus mengandung angka.
				</li>
				<li data-hs-strong-password-hints-rule-text="special-characters"
				    class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
						<span class="hidden" data-check="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
						</span>
					<span data-uncheck="">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							     viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
						</span>
					Harus mengandung karakter khusus.
				</li>
			</ul>
		</div>
	</div>
	@error($name)
	<p class="text-sm text-red-600 mt-1" id="hs-validation-name-error-helper">
		*{{ $message }}
	</p>
	@enderror
</div>



