<div class="flex items-start space-x-2 sm:space-x-4 p-2 sm:p-4 border border-gray-200 rounded-lg">
    <!-- Image -->
    <div class="flex-shrink-0 w-16 sm:w-24 h-24 sm:h-32">
        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $title }}"
            class="rounded-lg w-full h-full object-cover">
    </div>

    <!-- Informations produit -->
    <div class="flex-1">
        <h2 class="font-bold text-indigo-700 text-base sm:text-lg">
            <a href="{{ route('single-product', ['slug' => $slug]) }}" class="hover:underline">{{ $title }}</a>
        </h2>
        <p class="font-semibold text-gray-700 sm:text-md text-sm">{{ number_format($price, 2, ',', ' ') }} €</p>
        <p class="mt-1 sm:mt-2 text-gray-600 text-xs sm:text-sm line-clamp-2 sm:line-clamp-3">{{ $description }}</p>

        <!-- Lien voir détails -->
        <a href="{{ route('single-product', ['slug' => $slug]) }}"
            class="block mt-1 sm:mt-2 font-semibold text-indigo-500 text-xs sm:text-sm underline">+ Voir les détails</a>

        <!-- Boutons -->
        <div class="flex space-x-1 sm:space-x-2 mt-2 sm:mt-3">
            <button wire:click="addToCart({{ $product->id }})"
                class="bg-indigo-600 hover:bg-indigo-300 px-2 sm:px-4 py-1 sm:py-2 rounded-lg text-white text-xs sm:text-sm">
                Ajouter au panier
            </button>
            <button
                class="hover:bg-indigo-100 px-2 sm:px-4 py-1 sm:py-2 border border-indigo-600 rounded-lg text-indigo-600 text-xs sm:text-sm">
                ❤️
            </button>
        </div>

        <!-- Message de succès -->
        @if (session()->has('message'))
            <p class="mt-1 sm:mt-2 text-indigo-600 text-xs sm:text-sm">{{ session('message') }}</p>
        @endif
    </div>
</div>
