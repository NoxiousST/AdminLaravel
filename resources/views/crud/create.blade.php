@extends('layouts.main')

@section('content')
	<div class="h-full w-full py-8 space-y-8">
		<x-navigation.back :route="route( $routePrefix . '.index')" title="Tambah {{ $title }} Baru"
		                   previous="Kembali ke tabel {{ $title }}"></x-navigation.back>

		{{-- Create Form --}}
		<form class="z-50 mx-auto px-2 pt-4 pb-8" action="{{ route($routePrefix . '.store') }}"
		      method="POST" enctype="multipart/form-data" novalidate>
			@method('POST')
			@csrf
			<div class="grid gap-x-16 gap-y-6">
				@foreach($fields as $field)
					<div class="flex w-full flex-col items-center gap-y-2 px-2 md:flex-row md:px-0">
						<label for="{{ $field['name'] }}"
						       class="place-self-start md:font-normal font-bold md:text-accent-foreground text-primary lg:w-56 md:w-32 !py-0 pt-4 max-w-56">{{ $field['label'] }}
						</label>

						<div class="grid w-full">
							@if($field['type'] === 'select|idkategori')
								<x-preline.select
										id="{{ $field['name'] }}"
										name="{{ $field['name'] }}"
										class="dark:bg-accent dark:placeholder-gray-400 !m-0 dark:text-gray-200">
									<option value="none" selected disabled>Pilih Kategori...</option>
									@foreach($kategoris as $kategori)
										<option value="{{ $kategori->id }}">
											{{ $kategori->kategori }}
										</option>
									@endforeach
								</x-preline.select>

							@elseif($field['type'] == 'richeditor')
								<textarea id="richeditor" name="{{ $field['name'] }}"></textarea>


							@elseif($field['type'] == 'file')
								<x-preline.input.file :name="$field['name']"/>

							@else
								<x-preline.input
										class="bg-white dark:bg-accent shadow !m-0 place-content-center file:text-white file:bg-blue-600 file:px-2 file:rounded-lg file:py-1"
										:name="$field['name']"
										:type="$field['type']"
										placeholder="{{ 'Masukkan ' . $field['label'] . '...' }}"/>
							@endif

							@error($field['name'])
							<div class="text-sm text-rose-600">
								*{{ $message }}
							</div>
							@enderror
						</div>

					</div>
				@endforeach

			</div>

			<x-preline.button id="submit-all" size="lg" type="submit"
			                  class="mx-auto my-12 flex w-96 place-self-center uppercase tracking-widest shadow-lg transition-all bg-primary font-rubik hover:ring-4 dark:ring-primary/50 dark:text-white">
				Simpan
			</x-preline.button>
		</form>
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
