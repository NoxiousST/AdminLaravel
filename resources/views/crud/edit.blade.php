@extends('layouts.main')

@section('content')
	<div class="w-full h-full py-8 space-y-8">
		<x-navigation.back :route="route( $routePrefix . '.index')" title="Update {{ $title }} #{{ $data->id }}"
		                   previous="Kembali ke tabel {{ $title }}"></x-navigation.back>

		{{-- Update Form --}}
		<form class="z-50 mx-auto pt-4 pb-8 px-2" action="{{ route($routePrefix . '.update', $data->id) }}"
		      method="POST"
		      enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="grid gap-x-16 gap-y-6">
				@foreach($fields as $field)
					<div class="flex w-full flex-col items-center gap-y-2 px-2 md:flex-row md:px-0">
						<label for="{{ $field['name'] }}"
						       class="place-self-start md:font-normal font-bold md:text-accent-foreground text-primary w-64 !py-0 pt-4 max-w-64">{{ $field['label'] }}
						</label>

						<div class="grid w-full">
							@if($field['type'] === 'select|idkategori')
								<x-preline.select
										id="{{ $field['name'] }}"
										name="{{ $field['name'] }}"
										class="dark:bg-accent dark:placeholder-gray-400 !m-0 dark:text-gray-200">
									<option value="none" selected disabled>Pilih Kategori...</option>
									@foreach($kategoris as $kategori)
										<option value="{{ $kategori->id }}"
												@selected($data[$field['name']] == $kategori->id)>
											{{ $kategori->kategori }}
										</option>
									@endforeach
								</x-preline.select>

							@elseif($field['type'] == 'richeditor')
								<textarea id="richeditor"
								          name="{{ $field['name'] }}">{{ $data[$field['name']] }}</textarea>

							@elseif($field['type'] == 'file')
								<x-preline.input.file :name="$field['name']" :data="$data[$field['name']]"
								                      :route="$routePrefix"/>

							@else
								<x-preline.input
										class="bg-white dark:bg-accent shadow !m-0 place-content-center file:text-white file:bg-blue-600 file:px-2 file:rounded-lg file:py-1"
										:name="$field['name']"
										:value="$data[$field['name']]"
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

				<div class="sr-only w-full items-center hidden">
					<x-preline.input class="bg-white shadow !m-0" type="number" name="deleted" placeholder="0"
					                 value="0"/>
				</div>
			</div>

			<x-preline.button size="lg" type="submit"
			                  class="my-12 w-96 shadow-lg flex bg-primary dark:ring-primary/50 hover:ring-4 transition-all dark:text-white mx-auto place-self-center font-rubik uppercase tracking-widest">
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
