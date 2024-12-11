<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	@vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative antialiased bg-[hsl(229,17%,18%)]">
<img src="{{ asset('img/forest.jpg') }}" class="absolute bg-cover h-full bg-right right-0 z-0 aspect-video" alt="logo"/>
<div class="relative h-screen w-full flex bg-[radial-gradient(circle_farthest-side_at_right_top,hsla(229,17%,18%,0.40)_0%,hsla(229,17%,18%,0.70)_20%,hsla(229,17%,18%,0.90)_40%,hsla(229,17%,18%,1)_60%)]
">
	<form class="lg:w-1/2 w-full h-full xl:px-24 lg:px-12 md:px-24 sm:px-8 px-4 py-16 rounded-lg flex flex-col justify-center gap-y-5"
	        action="{{ route('login') }}"
	        method="POST">
		@csrf

		{{--<img src="{{ asset('img/kominfo.png') }}" alt="logo-dinkominfo" class="size-24"/>--}}
		<div class="space-y-4 mb-16">
			<p class="uppercase text-gray-400 font-gilroy font-bold tracking-widest text-sm border-b-4 pb-1 border-blue-500 w-fit">Login</p>
			<p class="font-gilroy text-5xl font-bold tracking-wide text-foreground">Sign in to your account<span
						class="text-blue-500">.</span></p>
		</div>

		<div class="w-full grid gap-y-12 mb-12">
			<x-preline.input.auth name="username" label="Username*" placeholder="johndoe" type="text" icon="lucide-user"/>
			<x-preline.input.auth name="pwd" label="Password*" placeholder="" type="password" icon="lucide-lock-keyhole"/>
		</div>

		<button type="submit"
		        class="font-lato uppercase w-1/2 md:place-self-end place-self-center py-3 px-4 inline-flex justify-center items-center gap-x-3 text-sm font-bold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
			Login
			<x-lucide-log-in class="size-5" stroke-width="2.6"/>
		</button>

	</form>
	<img src="{{ asset('img/kominfo.png') }}" class="hidden lg:block absolute rounded-full size-16 bottom-24 right-28 brightness-125" alt="logo"/>
</div>

</body>
</html>
