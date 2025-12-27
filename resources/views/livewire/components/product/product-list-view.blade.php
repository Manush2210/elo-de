<div class="flex items-start space-x-2 sm:space-x-4 p-2 sm:p-4 border border-gray-200 rounded-lg">
    <!-- Image -->
    <div class="flex-shrink-0 w-16 sm:w-24 h-24 sm:h-32">
        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $title }}"
            class="rounded-lg w-full h-full object-cover">
    </div>

    <!-- Produktinformationen -->
    <div class="flex-1">
        <h2 class="font-bold text-cyan-700 text-base sm:text-lg">
            <a href="{{ route('single-product', ['slug' => $slug]) }}" class="hover:underline">{{ $title }}</a>
        </h2>
        <p class="font-semibold text-gray-700 sm:text-md text-sm">{{ number_format($price, 2, ',', ' ') }} €</p>
        <p class="mt-1 sm:mt-2 text-gray-600 text-xs sm:text-sm line-clamp-2 sm:line-clamp-3">{{ $description }}</p>

        <!-- Details anzeigen Link -->
        <a href="{{ route('single-product', ['slug' => $slug]) }}"
            class="block mt-1 sm:mt-2 font-semibold text-cyan-500 text-xs sm:text-sm underline">+ Details anzeigen</a>

        <!-- Buttons -->
        <div class="flex space-x-1 sm:space-x-2 mt-2 sm:mt-3">
            <button wire:click="addToCart({{ $product->id }})"
                class="bg-cyan-600 hover:bg-cyan-300 px-2 sm:px-4 py-1 sm:py-2 rounded-lg text-white text-xs sm:text-sm">
                In den Warenkorb
            </button>
            <button
                class="hover:bg-cyan-100 px-2 sm:px-4 py-1 sm:py-2 border border-cyan-600 rounded-lg text-cyan-600 text-xs sm:text-sm">
                ❤️
            </button>
        </div>

        <!-- Erfolgsmeldung -->
        @if (session()->has('message'))
            <p class="mt-1 sm:mt-2 text-cyan-600 text-xs sm:text-sm">{{ session('message') }}</p>
        @endif
    </div>
</div>
