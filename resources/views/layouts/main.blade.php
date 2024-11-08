<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	@vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
	<x-head.tinymce-config/>
</head>
<body class="relative dark:bg-[#131521]">
<x-dialog>

	@include('layouts.navbar')
	<img src="{{ asset('img/back.webp') }}" class="absolute bg-cover w-screen h-full brightness-100 blur-2xl">
	<div class="flex min-h-screen overflow-hidden backdrop-blur-lg bg-white/75 dark:bg-[#131521]/85">

		@include('layouts.sidebar')

		<div id="main-content" class="h-full w-full relative overflow-y-auto lg:ml-80">
			<main class="sm:px-4 md:px-12 lg:px-24 pt-32 pb-16">
				@yield('content')
			</main>
		</div>
	</div>

</x-dialog>
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

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>
