<div>
    <section class="bg-gray-50 py-8">
        <div class="mx-auto px-4 container">
            <!-- Header mit Suchleiste -->
            <div class="flex md:flex-row flex-col justify-between items-center gap-4 mb-8">
                <h2 class="font-['Dancing_Script'] text-gray-600 text-4xl">Shop</h2>

                <div class="flex items-center gap-4 w-full md:w-auto">
                    <!-- Suchleiste -->
                    <div class="relative flex-1 md:w-96">
                        <input type="text" wire:model.live="search" placeholder="Ein Produkt suchen..."
                            class="px-4 py-2 border border-gray-200 focus:border-cyan-500 rounded-lg outline-none focus:ring-1 focus:ring-cyan-500 w-full transition">
                        <div class="top-1/2 right-3 absolute text-gray-400 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Ansichtsmodi -->
                    <div class="flex items-center gap-2">
                        <button wire:click="toggleViewMode"
                            class="p-2 rounded-lg hover:bg-gray-100 transition {{ $viewMode === 'grid' ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button wire:click="toggleViewMode"
                            class="p-2 rounded-lg hover:bg-gray-100 transition {{ $viewMode === 'list' ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Produktgitter -->
            <div x-data="{ viewMode: @entangle('viewMode') }" x-cloak>
                <div id="grid-view" x-show="viewMode === 'grid'"
                    class="gap-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @forelse ($products as $item)
                        @livewire(
                            'components.product.product-card',
                            [
                                'images' => $item->images,
                                'title' => $item->name,
                                'price' => $item->price,
                                'slug' => $item->slug,
                                'product' => $item,
                            ],
                            key('grid-' . $item->id)
                        )
                    @empty
                        <div class="col-span-full py-8 text-center">
                            <h3 class="text-gray-600 text-xl">Keine Produkte gefunden</h3>
                            <p class="mt-2 text-gray-500">Wir haben keine Produkte gefunden, die Ihrer Suche entsprechen.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Listenansicht -->
                <div id="list-view" x-show="viewMode === 'list'" class="flex flex-col gap-4">
                    @forelse ($products as $item)
                        @livewire(
                            'components.product.product-list-view',
                            [
                                'images' => $item->images,
                                'title' => $item->name,
                                'price' => $item->price,
                                'slug' => $item->slug,
                                'description' => $item->description,
                                'product' => $item,
                            ],
                            key('list-' . $item->id)
                        )
                    @empty
                        <div class="py-8 text-center">
                            <h3 class="text-gray-600 text-xl">Keine Produkte gefunden</h3>
                            <p class="mt-2 text-gray-500">Wir haben keine Produkte gefunden, die Ihrer Suche entsprechen.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
