@extends('layouts.main')

@section('content')
	<div class="flex flex-col">

		{{-- Breadcrumbs --}}
		<nav class="mb-2 flex justify-center">
			<ol class="mb-3 inline-flex items-center text-xs text-gray-400 space-x-1 sm:mb-0 [&_.active-breadcrumb]:font-medium [&_.active-breadcrumb]:text-neutral-600">
				<li class="flex h-full items-center">
					<a href="#_"
					   class="inline-flex items-center rounded-md px-2 py-1.5 space-x-1.5 hover:bg-neutral-100 hover:text-neutral-900">
						<x-lucide-layers class="text-gray-400 size-3.5" stroke-width="2.8"/>
						<span>Pages</span>
					</a>
				</li>
				<x-lucide-chevron-right class="text-gray-400 size-4" stroke-width="2.8"/>
				<li>
					<a href="#_"
					   class="inline-flex items-center rounded-md px-2 font-normal py-1.5 space-x-1.5 hover:text-neutral-900 focus:outline-none dark:text-blue-500 dark:hover:bg-blue-600 dark:hover:text-white">
						@svg('lucide-newspaper', ['class' => 'size-3.5', 'stroke-width' => 2.8])
						<span>Admin {{ $title }}</span>
					</a>
				</li>
			</ol>
		</nav>

		<x-typography.h3 class="border-none font-lato">Admin {{ $title }}</x-typography.h3>

		{{-- Search Form --}}
		<x-form class="flex w-full gap-x-4 my-4" action="{{ route($routePrefix . '.index') }}" method="GET">
			<div class="basis-1/2">
				<x-form.item>
					<x-form.label class="font-rubik">Apa yang anda cari?</x-form.label>
					<div class="relative w-full">
						<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
							<x-lucide-search class="size-4 text-gray-400"/>
						</div>
						<x-input name="search" value="{{ request('search') }}"
						         class="ps-10 placeholder:text-gray-400 bg-slate-50 dark:bg-transparent dark:border-gray-600 rounded-full focus-visible:bg-slate-100 dark:focus-visible:bg-[#131521]/20"
						         x-form:control placeholder="Cari data..."/>
					</div>
				</x-form.item>
			</div>
			<div class="flex gap-x-4 basis-1/2 !my-0">

				<x-button type="submit"
				          class="place-self-end bg-blue-700 dark:text-white w-36 font-maven uppercase rounded-xl">Cari
				</x-button>
			</div>
		</x-form>

		<div class="my-4 flex w-full flex-col justify-between gap-y-4 px-4 sm:px-2 md:flex-row md:px-0">
			<div class="flex items-center justify-between gap-4 md:justify-between">
				<div class="flex items-center gap-4">
					<p class="font-bold font-lato dark:text-gray-200">Total Records</p>
					<x-badge class="h-fit justify-center rounded-full text-sm font-rubik min-w-12 min-h-8 dark:bg-black/35 dark:text-white dark:hover:bg-white/5">
						{{ $total }}
					</x-badge>
				</div>
				<x-button onclick="location.href='{{ route($routePrefix . '.create') }}'"
				          class="rounded-xl bg-blue-700 uppercase leading-loose transition-all font-maven dark:text-white dark:hover:ring-4">
					<x-lucide-plus class="size-5 sm:me-3" stroke-width="2.6"/>
					<span class="hidden sm:block">Tambah {{ $title }}</span>
				</x-button>
			</div>
			<div class="flex justify-center gap-2">
				<x-button variant="icon" class="dark:text-gray-400 dark:hover:text-white">
					<x-lucide-download class="size-4 me-2" stroke-width="2.6"/>
					Download Data
				</x-button>
				<x-button variant="icon" class="dark:text-gray-400 dark:hover:text-white">
					<x-lucide-copy class="size-4 me-2" stroke-width="2.6"/>
					<span class=""> Copy as JSON</span>
				</x-button>
			</div>
		</div>

		{{-- Table Content --}}
		<div class="w-full max-w-full overflow-x-auto">
			<table class="table table-fixed min-w-full bg-black/10 backdrop-blur-xl rounded-lg">
				<thead class="capitalize">
				<tr class="">
					<th class="p-4 table-cell w-4 sticky left-0 dark:bg-[#131521] rounded-t-lg max-w-4 !min-w-12 grow-0">
						<x-checkbox/>
					</th>
					@foreach ($columns as $column)
						<th class="px-2 lg:w-40 sm:w-36 max-w-screen-2xl min-w-36 py-8 border-y !border-gray-700">
							<p class="text-left block font-sans text-sm antialiased font-bold leading-none text-gray-300">
								{{ $column['label'] }}
							</p>
						</th>
					@endforeach
					<th scope="col" class="sm:table-cell w-8 dark:bg-[#131521] rounded-t-xl hidden max-w-8">
						<span class="sr-only">Actions</span>
					</th>
				</tr>
				</thead>
				<tbody>

				@foreach ($data as $item)
					<tr class="relative group dark:hover:bg-white/5 h-fit !max-h-24">
						<th class="border-none !z-0 p-1 table-cell sticky left-0 dark:bg-[#131521]">
							<x-checkbox/>
						</th>
						@foreach ($columns as $column)
							<td class="p-2 text-base font-medium border-y dark:!border-gray-700/50">
								<p class="text-gray-900 dark:text-gray-300 group-hover:dark:text-white font-maven text-sm line-clamp-1 break-all">
									{{ $column['name'] === 'id_kategori' ? $item->kategori->kategori : $item->{$column['name']} }}
								</p>
							</td>
						@endforeach
						<td class="sm:table-cell hidden px-4 py-3 bg-white/5 dark:bg-[#131521] !border-none">
							<x-dropdown-menu>
								<x-dropdown-menu.trigger
										class="bg-transparent text-gray-500 dark:hover:bg-white/5 dark:hover:text-white shadow-none border-none inline-flex items-center text-sm font-medium p-1.5 text-center rounded-lg focus-visible:text-gray-800">
									<x-lucide-ellipsis class="w-6 h-6 fill-gray-800"/>
								</x-dropdown-menu.trigger>
								<x-dropdown-menu.content align="end"
								                         class="dark:bg-[#1f213644] backdrop-blur-lg shadow-lg !z-50 absolute">
									<x-dropdown-menu.label>Aksi</x-dropdown-menu.label>
									<x-dropdown-menu.separator/>
									<x-dropdown-menu.item class="!bg-transparent !p-0">
										<x-button onclick=""
										          class="justify-start px-2 !w-full h-full !m-0 inline-flex text-gray-400 bg-transparent hover:bg-white/10">
											<x-lucide-copy class="size-4 me-3" stroke-width="2.6"/>
											Copy JSON
										</x-button>
									</x-dropdown-menu.item>
									<x-dropdown-menu.item class="!bg-transparent !p-0">
										<x-button onclick="location.href='{{ route( $routePrefix . '.edit', $item->id) }}'"
												class="justify-start px-2 !w-full h-full !m-0 inline-flex text-gray-400 bg-transparent hover:bg-white/10">
											<x-lucide-edit class="size-4 me-3" stroke-width="2.6"/>
											Edit
										</x-button>
									</x-dropdown-menu.item>
									<x-dropdown-menu.item class="!bg-transparent !p-0">
									</x-dropdown-menu.item>
								</x-dropdown-menu.content>
							</x-dropdown-menu>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="py-2">
			{{ $data->links() }}
		</div>

	</div>


@endsection
