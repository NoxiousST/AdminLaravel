@extends('layouts.main')

@section('content')
	<div class="w-full h-full p-4">
		<div class="flex justify-between w-full">
			<x-navigation.back :route="url()->previous()" title="Account" previous="Dashboard"></x-navigation.back>
			<div class="space-y-2">
				<p class="text-muted-foreground/50 text-xs uppercase font-lato text-right font-bold">API Token</p>
				<input type="hidden" id="hs-clipboard" value="{{ Crypt::decryptString(Auth::user()->api_token) }}">
				<button id="hs-copy-btn" type="button"
				        class="js-clipboard-example [--is-toggle-tooltip:false] hs-tooltip relative py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-mono rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-card/50 dark:border-neutral-700 dark:text-white dark:hover:bg-card transition-colors"
				        data-clipboard-target="#hs-clipboard" data-clipboard-action="copy"
				        data-clipboard-success-text="Copied">
					$
					<p class="w-36 truncate">
						{{ Crypt::decryptString(Auth::user()->api_token) }}
					</p>
					<span class="shrink-0 border-s ps-3.5 dark:border-neutral-700">
					<x-lucide-clipboard class="js-clipboard-default size-4 transition"/>
					<x-lucide-check class="js-clipboard-success hidden size-4 text-primary" stroke-width="2.8"/>
				</span>

					<span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700"
					      role="tooltip">
					<span class="js-clipboard-success-text">Copy</span>
				</span>
				</button>
			</div>
		</div>

		{{-- Update Form --}}
		<form class="z-50 mx-auto max-w-5xl pt-4 pb-8 space-y-8 md:space-y-16"
		      action="{{ route($routePrefix . '.update', $account->id) }}"
		      method="POST">
			@csrf
			@method('PUT')

			<div class="bg-card rounded-3xl sm:p-8 p-4 w-full space-y-8 transition-all">
				<div class="text-indigo-400 w-fit bg-indigo-500/15 rounded-lg p-3 uppercase text-sm font-gilroy font-bold tracking-wider">
					Informasi Pribadi
				</div>
				<div class="w-full flex flex-col lg:flex-row items-center gap-12 transition-all">
					<x-preline.avatar class="md:size-36 sm:size-28 size-24 md:text-[5rem] sm:text-6xl text-5xl"/>
					<div class="w-full grid md:grid-cols-2 grid-cols-1 gap-y-6 gap-x-16 transition-all">
						@foreach($fields1 as $field)
							<div class="flex items-center">
								<label for="{{ $field['name'] }}"
								       class="text-card-foreground w-56 text-sm">
									{{ $field['label'] }}
								</label>

								@if($field['type'] == 'number')
									<x-preline.input.number :name="$field['name']" :value="$account[$field['name']]"
									                        :placeholder="$field['placeholder']"/>
								@else
									<x-preline.input :name="$field['name']"
									                 :type="$field['type']"
									                 :value="$account[$field['name']]"
									                 :placeholder="$field['placeholder']"/>
								@endif

								@error($field['name'])
								<div class="text-sm text-rose-600">
									*{{ $message }}
								</div>
								@enderror
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="bg-card rounded-3xl sm:p-8 p-4 w-full space-y-8 transition-all">
				<div class="text-indigo-400 w-fit bg-indigo-500/15 rounded-lg p-3 uppercase text-sm font-gilroy font-bold tracking-wider">
					Informasi Tambahan
				</div>
				<div class="grid md:grid-cols-2 grid-cols-1 gap-y-6 gap-x-20 transition-all">
					@foreach($fields2 as $field)
						<div class="flex items-center">
							<label for="{{ $field['name'] }}"
							       class="text-card-foreground w-60 text-sm">
								{{ $field['label'] }}
							</label>

							@if($field['type'] == 'number')
								<x-preline.input.number :name="$field['name']" :value="$account[$field['name']]"
								                        :placeholder="$field['placeholder']"/>
							@else
								<x-preline.input :name="$field['name']"
								                 :type="$field['type']"
								                 :value="$account[$field['name']]"
								                 :placeholder="$field['placeholder']"/>
							@endif

							@error($field['name'])
							<div class="text-sm text-rose-600">
								*{{ $message }}
							</div>
							@enderror
						</div>
					@endforeach
				</div>
			</div>

			<div class="flex md:justify-end justify-center">
				<x-preline.button type="submit" class="md:w-64 w-full">
					Simpan
				</x-preline.button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
        document.getElementById('hs-copy-btn').addEventListener('click', async () => {
            const textToCopy = document.getElementById('hs-clipboard').value;
            try {
                await navigator.clipboard.writeText(textToCopy);
                // Get the elements
                const defaultElement = document.getElementsByClassName('js-clipboard-default')[0];
                const successElement = document.getElementsByClassName('js-clipboard-success')[0];
                const successTextElement = document.getElementsByClassName('js-clipboard-success-text')[0];

                defaultElement.classList.add('hidden');
                successElement.classList.remove('hidden');

                successTextElement.innerText = "Copied";

                setTimeout(() => {
                    defaultElement.classList.remove('hidden');
                    successElement.classList.add('hidden');

                    successTextElement.innerText = "Copy";
                }, 3000);

            } catch (err) {
                console.error('Failed to copy text: ', err);
            }
        });
	</script>
@endsection
