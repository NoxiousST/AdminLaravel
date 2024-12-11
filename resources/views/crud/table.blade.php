@extends('layouts.main')

@section('content')
	<div class="flex flex-col px-4">

		{{-- Breadcrumbs --}}
		<div class="flex md:flex-row flex-col items-center gap-4 mb-8">
			<p class="text-foreground text-2xl font-bold border-none font-lato">Admin {{ $title }}</p>
			<span class="md:block hidden bg-indigo-300/40 mr-2 w-px h-8 rounded-full"></span>
			<ol class="flex items-center whitespace-nowrap">
				<li class="inline-flex items-center">
					<a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-white dark:focus:text-blue-500" href="#">
						<x-lucide-home class="me-3 size-4" stroke-width="2.5"/>
						Home
					</a>
					<x-lucide-chevron-right class="text-gray-500 mx-3 size-4" stroke-width="2.8"/>
				</li>
				<li class="inline-flex items-center">
					<a class="flex items-center text-sm text-gray-500 dark:text-indigo-500 dark:hover:text-indigo-400">
						<x-lucide-table-2 class="me-3 size-4 shrink-0" stroke-width="2.5"/>
						Admin {{ $title }}
					</a>
				</li>
			</ol>
		</div>

		{{-- Table --}}
		<livewire:data.table :columns="$columns" :data="$data" :title="$title" :route="$routePrefix"/>

	</div>


@endsection
