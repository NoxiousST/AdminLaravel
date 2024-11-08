<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	@vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative antialiased ">
<img src="{{ asset('img/office.jpg') }}" class="absolute bg-cover w-screen h-full brightness-100">
<div class="relative h-screen w-screen flex justify-center items-center dark:bg-[#131521]/95 backdrop-saturate-100 backdrop-blur-2xl">
	<div class="w-[28rem] h-[92vh] p-16 bg-gradient-to-b from-[#131521] to-[#22263b] rounded-lg flex flex-col gap-y-4 justify-between items-center  border-b-4 border-blue-600 shadow-2xl">
		<img src="{{ asset('img/kominfo.png') }}" alt="logo-dinkominfo" class="size-44"/>

		<div class="w-full space-y-8">
			<x-typography.h3 class="capitalize text-center font-lato tracking-wider">Login ke Akun Anda</x-typography.h3>
			<div class="relative">
				<input type="email"
				       class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-black/25 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-blue-600"
				       placeholder="Enter name">
				<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
					<x-lucide-user class="shrink-0 size-4 text-gray-500 dark:text-neutral-500"/>
				</div>
			</div>

			<div class="relative">
				<input type="password"
				       class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-black/25 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-blue-600"
				       placeholder="Enter password">
				<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
					<x-lucide-key-round class="shrink-0 size-4 text-gray-500 dark:text-neutral-500"/>
				</div>
			</div>
		</div>

		<button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
			Login
		</button>

	</div>
</div>

</body>
</html>
