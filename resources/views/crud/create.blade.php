@extends('layouts.main')

@section('content')
	<div class="w-full h-full py-8">
		<div class="flex items-center gap-4 max-w-5xl mx-auto md:px-0 px-2">
			<x-button onclick="window.location.href='{{ route( $routePrefix . '.index') }}'" variant="outline"
			          size="icon"
			          class="bg-transparent border border-gray-400 hover:border-blue-500 size-10 transition-all hover:bg-blue-500 hover:text-white hover:ring-4">
				<x-lucide-arrow-left class="size-4" stroke-width="2.7"/>
			</x-button>
			<div class="mb-1">
				<p class="text-gray-400 text-xs">Kembali ke tabel <span class="lowercase">{{ $routePrefix }}</span>
				</p>
				<h4 class="font-bold text-lg">Tambah {{ $routePrefix }} Baru</h4>
			</div>
		</div>


		@if ($errors->has('error'))
			<div class="alert alert-danger">
				{{ $errors->first('error') }}
			</div>
		@endif

		{{-- Create Form --}}
		<x-form id="my-dropzone" class="max-w-5xl mx-auto pb-8 pt-4 z-50" action="{{ route($routePrefix . '.store') }}"
		        method="POST"
		        enctype="multipart/form-data">
			@csrf
			<div class="grid gap-x-16 gap-y-5">
				@foreach($fields as $field)
					<x-form.item class="flex md:px-0 px-2 md:flex-row flex-col w-full items-center gap-y-2">
						<x-form.label for="{{ $field['name'] }}" class="w-64 max-w-64">
							{{ $field['label'] }}
						</x-form.label>

						@switch($field['type'])
							@case('select|idkategori')
								<x-select id="{{ $field['name'] }}" name="{{ $field['name'] }}"
								          class="dark:bg-[#131521]/80 dark:placeholder-gray-400">
									<option value="none" selected disabled>Pilih Kategori...</option>
									@foreach($kategoris as $kategori)
										<option value="{{ $kategori->id }}">{{ $kategori->kategori ? $kategori->kategori : $kategori->nama_kategori }}</option>
									@endforeach
								</x-select>
								@break

							@case('richeditor')
								<textarea id="richeditor" class="shadow dark:bg-[#131521]/30"
								          name="{{ $field['name'] }}"></textarea>
								@break

							@case('file')
								<div class="flex w-full items-center justify-center gap-4">
									<div id="clearButtonContainer{{ $field['name'] }}" class="relative group hidden">
										<img id="preview{{ $field['name'] }}"
										     class="shrink-0 rounded-lg object-cover size-40" src="#" alt="Preview File"
										     loading="lazy"/>
										<button type="button" onclick="clearImageInput('{{ $field['name'] }}')"
										        class="flex justify-center items-center group-hover:backdrop-blur-sm backdrop-blur-none transition-all text-red-500 absolute top-0 left-0 w-full h-full bg-transparent group-hover:bg-[#131521]/50 rounded-lg">
											<x-lucide-x
													class="opacity-0 group-hover:opacity-100 transition-all size-16 text-rose-600"/>
										</button>
									</div>

									<label for="{{ $field['name'] }}"
									       class="shrink group dark:bg-[#131521]/25 dark:hover:bg-[#131521]/55 flex flex-col items-center justify-center w-full h-44 border-2 dark:border-gray-700 border-dashed rounded-lg cursor-pointer transition-all">
										<x-lucide-upload-cloud class="text-gray-400 size-10 dark:text-gray-500"/>
										<p class="mb-2 text-sm text-gray-500 dark:text-gray-500 group-hover:dark:text-gray-400">
											<span class="font-semibold">Click to upload</span> or drag and drop
										</p>
										<p class="text-xs text-gray-500 dark:text-gray-500 group-hover:dark:text-gray-400">
											SVG, PNG, JPG or GIF (MAX. 800x400px)
										</p>
										<input id="{{ $field['name'] }}" name="{{ $field['name'] }}"
										       onchange="previewImage(event, '{{ $field['name'] }}')" type="file"
										       class="hidden"/>
									</label>
								</div>

								{{--	<div class="w-full" data-hs-file-upload='{
	  "url": "{{ route( $routePrefix . '.uploads') }}",
	  "acceptedFiles": "image/*",
	  "autoProcessQueue": true,
	  "addRemoveLinks": true,
	  "singleton": true,
	  "maxFiles": 1,
	  "headers": {
		"X-CSRF-TOKEN": "{{ csrf_token() }}"
	  },
	  "extensions": {
		"default": {
		  "class": "shrink-0 size-5 w-full"
		}
	  }
	}'>
										<template data-hs-file-upload-preview="">
											<div class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-[#131521]/50 dark:border-neutral-600">
												<div class="mb-1 flex justify-between items-center">
													<div class="flex items-center gap-x-3">
			  <span class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500"
					data-hs-file-upload-file-icon="">
				<img class="rounded-lg hidden" data-dz-thumbnail="">
			  </span>
														<div>
															<p class="text-sm font-medium text-gray-800 dark:text-white">
																<span class="truncate inline-block max-w-[300px] align-bottom"
																	  data-hs-file-upload-file-name=""></span>.<span
																		data-hs-file-upload-file-ext=""></span>
															</p>
															<p class="text-xs text-gray-500 dark:text-neutral-500"
															   data-hs-file-upload-file-size=""></p>
														</div>
													</div>
													<div class="flex items-center gap-x-2">
														<button type="button"
																class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
																data-hs-file-upload-remove="">
															<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
																 width="24" height="24" viewBox="0 0 24 24" fill="none"
																 stroke="currentColor" stroke-width="2"
																 stroke-linecap="round" stroke-linejoin="round">
																<path d="M3 6h18"></path>
																<path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
																<path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
																<line x1="10" x2="10" y1="11" y2="17"></line>
																<line x1="14" x2="14" y1="11" y2="17"></line>
															</svg>
														</button>
													</div>
												</div>

												<div class="flex items-center gap-x-3 whitespace-nowrap">
													<div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
														 role="progressbar" aria-valuenow="0" aria-valuemin="0"
														 aria-valuemax="100" data-hs-file-upload-progress-bar="">
														<div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500"
															 style="width: 0"
															 data-hs-file-upload-progress-bar-pane=""></div>
													</div>
													<div class="w-10 text-end">
			  <span class="text-sm text-gray-800 dark:text-white">
				<span data-hs-file-upload-progress-bar-value="">0</span>%
			  </span>
													</div>
												</div>
											</div>
										</template>

										<div class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-[#131521]/50 dark:border-neutral-600"
											 data-hs-file-upload-trigger="">
											<div class="text-center">
		  <span class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full dark:bg-neutral-700 dark:text-neutral-200">
			<svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
				 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
			  <polyline points="17 8 12 3 7 8"></polyline>
			  <line x1="12" x2="12" y1="3" y2="15"></line>
			</svg>
		  </span>

												<div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
			<span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
			  Drop your file here or
			</span>
													<span class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">browse</span>
												</div>

												<p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
													Pick a file up to 2MB.
												</p>
											</div>
										</div>

										<div class="mt-4 space-y-2 empty:mt-0" data-hs-file-upload-previews=""></div>
									</div>--}}
								@break

							@default
								<x-input id="{{ $field['name'] }}" class="bg-white dark:bg-[#131521]/30 shadow !mt-0"
								         :name="$field['name']" x-form:control :type="$field['type']"
								         placeholder="{{ 'Masukkan ' . $field['label'] . '...' }}"/>
						@endswitch

						<x-form.message/>
					</x-form.item>
				@endforeach

				<x-form.item class="w-full items-center sr-only">
					<x-form.label class="w-64 max-w-64 pt-4 place-self-start">Deleted</x-form.label>
					<x-input type="number" name="deleted" x-form:control placeholder="0" value="0"/>
					<x-form.message/>
				</x-form.item>
			</div>

			<x-button size="lg" type="submit"
			          class="shadow-lg flex bg-blue-600 hover:bg-blue-500 hover:ring-4 transition-all dark:text-white mx-auto place-self-center font-rubik uppercase tracking-widest">
				Simpan
			</x-button>
		</x-form>
	</div>


	<script>
        function previewImage(event, id) {
            const [file] = document.getElementById(id).files;
            const imagePreview = document.getElementById('preview' + id);
            const clearButtonContainer = document.getElementById('clearButtonContainer' + id);

            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    clearButtonContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function clearImageInput(id) {
            const imageInput = document.getElementById(id);
            const imagePreview = document.getElementById('preview' + id);
            const clearButtonContainer = document.getElementById('clearButtonContainer' + id);
            const deleteCheckbox = document.getElementById('delete_' + id);

            imageInput.value = ''; // Clear the file input
            imagePreview.src = '#'; // Reset the image source
            imagePreview.style.display = 'none'; // Hide the preview
            clearButtonContainer.style.display = 'none'; // Hide the "Clear" button
            if (deleteCheckbox) deleteCheckbox.checked = true; // Mark for deletion
        }
	</script>


@endsection
