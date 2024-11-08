@extends('layouts.main')

@section('content')
<div class="w-full h-full py-8">
	<div class="flex items-center gap-4 max-w-5xl mx-auto md:px-0 px-2">
		<x-button onclick="window.location.href='{{ route( $routePrefix . '.index') }}'"
		          variant="outline" size="icon"
		          class="bg-transparent border border-gray-400 hover:border-blue-500 size-10 transition-all hover:bg-blue-500 hover:text-white hover:ring-4">
			<x-lucide-arrow-left class="size-4" stroke-width="2.7"/>
		</x-button>
		<div class="mb-1">
			<p class="text-gray-400 text-xs">Kembali ke tabel <span class="lowercase">{{ $routePrefix }}</span>
			</p>
			<h4 class="font-bold text-lg">Edit {{ $routePrefix }}</h4>
		</div>
	</div>


	{{-- Update Form --}}
	<x-form class="z-50 mx-auto max-w-5xl pt-4 pb-8" action="{{ route($routePrefix . '.update', $data) }}"
	        method="POST"
	        enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="grid gap-x-16 gap-y-5">
			@foreach($fields as $field)
				<x-form.item class="flex w-full flex-col items-center gap-y-2 px-2 md:flex-row md:px-0">
					<x-form.label for="{{ $field['name'] }}"
					              class="w-64 !py-0 pt-4 max-w-64">{{ $field['label'] }}
						{{--<span class="{{ $input['required'] ? 'inline-flex' : 'hidden' }} text-red-600 font-rubik">*</span>--}}
					</x-form.label>

					@if($field['type'] === 'select|idkategori')
						<x-select id="{{ $field['name'] }}" name="{{ $field['name'] }}" x-form:control
						          class="dark:bg-[#131521]/80 dark:placeholder-gray-400 !m-0 dark:text-gray-200">
							<option value="none" selected disabled>Pilih Kategori...</option>
							@foreach($kategoris as $kategori)
								<option {{ $data[$field['name']] == $kategori->id ? 'selected' : ''}} value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
							@endforeach
						</x-select>

					@elseif($field['type'] == 'richeditor')
						<textarea id="richeditor"
						          name="{{ $field['name'] }}">{{ $data[$field['name']] }}</textarea>

					@elseif($field['type'] == 'file')
						<x-file-input :name="$field['name']" :data="$data[$field['name']]" :route="$routePrefix"/>

					@else
						<x-input id="{{ $field['name'] }}"
						         class="bg-white dark:bg-[#131521]/30 shadow !m-0 place-content-center file:text-white file:bg-blue-600 file:px-2 file:rounded-lg file:py-1"
						         :name="$field['name']"
						         :value="$data[$field['name']]"
						         x-form:control
						         :type="$field['type']"
						         placeholder="{{ 'Masukkan ' . $field['label'] . '...' }}"/>
					@endif
					<x-form.message/>
				</x-form.item>
			@endforeach

			<x-form.item class="sr-only w-full items-center hidden">
				<x-form.label class="w-64 place-self-start pt-4 max-w-64">Deleted</x-form.label>
				<x-input class="bg-white shadow !m-0" type="number" name="deleted" x-form:control placeholder="0"
				         value="0"/>
			</x-form.item>
		</div>

		<x-button size="lg" type="submit"
		          class="mx-auto flex place-self-center bg-blue-600 uppercase tracking-widest shadow-lg transition-all font-rubik hover:bg-blue-500 hover:ring-4 dark:text-white">
			Simpan
		</x-button>
	</x-form>
</div>
@endsection
