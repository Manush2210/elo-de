<div class="flex flex-col bg-white p-2 sm:p-4 border border-gray-200 h-full">

    <div class="relative aspect-square">
        <img src="{{ asset('storage/' . $images[0]) ?? 'https://via.placeholder.com/300' }}" alt="{{ $title }}"
            class="rounded-lg w-full h-full object-cover">
    </div>

    <div class="flex-grow mt-2 sm:mt-4 text-center">
        <a href="{{ route('single-product', ['slug' => $slug]) }}">
            <h3 class="font-semibold text-gray-800 text-sm sm:text-base line-clamp-2">{{ $title }}</h3>
        </a>

        <p class="mt-1 font-semibold text-gray-400 text-base sm:text-lg">{{ number_format($price, 2, ',', ' ') }} €</p>
    </div>

    <div class="flex justify-center items-center gap-2 mt-auto pt-2 sm:pt-4">
        <button wire:click="addToCart({{ $product->id }})"
            class="bg-cyan-600 hover:bg-cyan-500 active:bg-cyan-700 px-3 sm:px-6 py-1.5 sm:py-3 rounded-lg text-white text-sm sm:text-base transition">
            In den Warenkorb
        </button>
        {{-- <button
            class="hover:bg-cyan-50 active:bg-cyan-100 px-2 sm:px-4 py-1.5 sm:py-3 border border-cyan-600 rounded-lg text-cyan-600 transition">
            ❤️
        </button> --}}
    </div>

</div>
