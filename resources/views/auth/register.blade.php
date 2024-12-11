<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	@vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative antialiased bg-[hsl(229,17%,18%)]">
<img src="{{ asset('img/forest.jpg') }}" class="absolute bg-cover h-full bg-right right-0 z-0 aspect-video" alt="logo"/>
<div class="relative h-screen w-full flex bg-[radial-gradient(circle_farthest-side_at_right_top,hsla(229,17%,18%,0.40)_0%,hsla(229,17%,18%,0.70)_20%,hsla(229,17%,18%,0.90)_40%,hsla(229,17%,18%,1)_60%)]
">
	<form class="transition-all lg:w-1/2 w-full h-fit xl:px-24 lg:px-12 md:px-24 sm:px-8 px-4 py-24 rounded-lg flex flex-col gap-y-5"
	      action="{{ route('register') }}"
	      method="POST">
		@csrf
		<div class="space-y-4">
			<p class="uppercase text-gray-400 font-gilroy font-bold tracking-widest text-sm border-b-4 pb-1 border-primary w-fit">
				Register</p>
			<p class="font-gilroy text-5xl font-bold tracking-wide text-foreground">Create new account<span
						class="text-primary">.</span></p>
		</div>

		<div class="w-full grid gap-y-8">
			<div class="flex lg:flex-row flex-col gap-x-4 gap-y-8">
				<x-preline.input.auth name="username" label="Username*" placeholder="johndoe" type="text"
				                      icon="lucide-user"/>
				<x-preline.input.auth name="telp" label="Telepon" placeholder="+62 800 0000 0000" type="tel"
				                      icon="lucide-phone"/>
			</div>

			<x-preline.input.auth name="email" label="Email" placeholder="johndoe@example.com" type="email"
			                      icon="lucide-at-sign"/>

			<div class="flex lg:flex-row flex-col gap-x-4 gap-y-8">
				<x-preline.input.auth name="fullname" label="Nama Lengkap" placeholder="John Doe" type="text"
				                      icon="lucide-circle-user"/>
				<x-preline.input.auth name="NIP" label="NIP" placeholder="12345" type="text" icon="lucide-hash"/>
			</div>

			<x-preline.input.auth.password name="pwd" label="Password*" placeholder="" type="password"
			                               icon="lucide-lock-keyhole"/>

		</div>

		<x-preline.button type="submit"
		                  class="w-full sm:w-1/2 font-lato uppercase md:place-self-end place-self-center py-3 px-4 inline-flex justify-center items-center gap-x-3 text-sm font-bold rounded-lg">
			Register
			<x-lucide-log-in class="size-5" stroke-width="2.6"/>
		</x-preline.button>

	</form>
	<img src="{{ asset('img/kominfo.png') }}"
	     class="hidden lg:block absolute rounded-full size-16 bottom-24 right-28 brightness-125" alt="logo"/>
</div>

</body>
</html>
