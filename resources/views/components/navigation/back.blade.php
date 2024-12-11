<div class="flex items-center gap-4 md:px-0 px-2">
	<a href="{{ $route }}"
	          class="text-foreground inline-flex items-center justify-center bg-transparent rounded border-2 border-accent hover:border-blue-500 size-10 transition-all hover:bg-primary ring-primary/50 hover:text-white hover:ring-4">
		<x-lucide-arrow-left class="size-4" stroke-width="2.7"/>
	</a>
	<div class="mb-1">
		<p class="text-gray-400 text-xs">Kembali ke
			<span class="lowercase">{{ $previous }}</span>
		</p>
		<h4 class="text-foreground font-bold text-lg">{{ $title }}</h4>
	</div>
</div>
