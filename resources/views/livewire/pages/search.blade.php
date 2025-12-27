<div>
    <section class="py-16">
        <div class="mx-auto px-4 container">
            <h2 class="mb-6 font-['Dancing_Script'] font-semibold text-gray-600 text-4xl text-left">Suchergebnisse</h2>

            <!-- Barre de recherche en haut des résultats -->
            <div class="mb-8 max-w-xl">
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Verfeinern Sie Ihre Suche..."
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600 w-full">
                    <button wire:click="$refresh" class="top-3 right-3 absolute text-gray-500 hover:text-cyan-600">
                        <x-heroicon-s-magnifying-glass class="w-5 h-5" />
                    </button>
                </div>
                <p class="mt-2 text-gray-500">
                    @if (strlen($search) >= 2)
                        {{ count($results) }} Produkt(e) gefunden für "{{ $search }}"
                    @else
                        Geben Sie mindestens 2 Zeichen ein, um die Suche zu starten
                    @endif
                </p>
            </div>

            <!-- Résultats de recherche -->
            @if (strlen($search) >= 2)
                <div class="flex flex-col gap-4">
                    @forelse ($results as $item)
                        @livewire(
                            'components.product.product-list-view',
                            [
                                'images' => $item->images,
                                'title' => $item->name,
                                'price' => $item->price,
                                'slug' => $item->slug,
                                'description' => $item->description,
                            ],
                            key($item->id)
                        )
                    @empty
                        <div class="bg-gray-50 py-12 rounded-lg text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-16 h-16 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mb-2 text-gray-600 text-2xl">Kein Produkt gefunden</h3>
                            <p class="mx-auto mb-6 max-w-md text-gray-500">
                                Wir haben keine Produkte gefunden, die "{{ $search }}" entsprechen.
                                Versuchen Sie andere Schlüsselwörter oder sehen Sie sich unsere beliebten Kategorien an.
                            </p>
                            <a href="{{ route('shop') }}"
                                class="inline-block bg-cyan-600 hover:bg-cyan-300 px-6 py-2 rounded-md font-medium text-white transition">
                                Alle Produkte durchsuchen
                            </a>
                        </div>
                    @endforelse
                </div>
            @elseif(empty($search))
                <!-- Affichage des produits populaires ou des catégories si aucune recherche n'est effectuée -->
                <div class="py-8 text-center">
                    <h3 class="mb-4 text-gray-600 text-2xl">Entdecken Sie unsere beliebten Produkte</h3>
                    <a href="{{ route('shop') }}"
                        class="inline-block bg-cyan-600 hover:bg-cyan-300 px-6 py-2 rounded-md font-medium text-white transition">
                        Shop durchsuchen
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
