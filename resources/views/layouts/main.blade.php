<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<x-editor.tinymce/>
</head>
<body class="flex dark:bg-background">
<livewire:layouts.mobile-sidebar/>
<livewire:layouts.sidebar/>
<div class="flex flex-col w-full h-screen overflow-hidden">

	<livewire:layouts.navbar/>
	<div id="main-content" class="bg-background h-full overflow-y-auto">
		<main class="sm:px-4 md:px-12 lg:px-20 py-16">
			@yield('content')
		</main>
	</div>

</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
    const toggleButton = document.getElementById('theme-toggle');

    // Check local storage for theme preference on page load
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Toggle dark mode and save preference in local storage
    toggleButton.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    });
</script>

{{-- DataTable --}}
<script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/dataTables.min.js') }}"></script>

<script type='text/javascript' src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/jszip.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/pdfmake.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/vfs_fonts.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/buttons.print.min.js') }}"></script>

{{-- Toast --}}
<script type="text/javascript" src="{{ asset('js/toastify.js') }}"></script>

<script>
    function tostifyCustomClose(el) {
        const parent = el.closest('.toastify');
        const close = parent.querySelector('.toast-close');

        close.click();
    }

    window.addEventListener('load', () => {
        (function () {
			@if (session('status'))
            const toastMarkup = `
						<div class="max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-card dark:border-card" role="alert" tabindex="-1" aria-labelledby="hs-toast-success-example-label">
							<div class="flex p-4">
								<div class="shrink-0">
									<svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
										<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
									</svg>
								</div>
								<div class="ms-3">
									<p id="hs-toast-success-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
										{{ session('status') }}
						            </p>
								</div>
								<button onclick="tostifyCustomClose(this)" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
									<span class="sr-only">Close</span>
									<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
								</button>
							</div>
						</div>
`;
            Toastify({
                text: toastMarkup,
                className: "!p-0 !rounded-xl !border-none !outline-none hs-toastify-on:opacity-100 hs-toastify-on:opacity-100 opacity-0 transition-all duration-500 w-[320px] rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 8000,
                close: true,
                gravity: "bottom",
                escapeMarkup: false
            }).showToast();
			@endif
        })();
    });
</script>

</body>


</html>
