<div>

    <section class="best-seller bg-gray-100 py-16">

        <div class="container text-center mx-auto">
            <h2 class="text-4xl mb-10 text-gray-600  text-left font-semibold  font-['Dancing_Script']">Boutique
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0">
                @forelse ($products as $item)
                    {{-- @dump($item) --}}
                    @livewire(
                        'components.product.product-card',
                        [
                            'images' => $item->images,
                            'title' => $item->name,
                            'price' => $item->price,
                            'slug' => $item->slug,
                        ],
                        key($item->id)
                    )


                @empty
                    @livewire('components.product.product-card', [
                        'images' => ['https://example.com/image1.jpg'],
                        'title' => 'Les Chuchotements du Cœur',
                        'price' => 45.99,
                        'slug' => 'les-chuchotements-du-coeur',
                    ])
                @endforelse



            </div>



        </div>

    </section>

    <section class="best-seller py-16">

        <div class="container text-left mx-auto">
            {{-- <h2 class="text-4xl mb-10 text-gray-600  text-left font-semibold  font-['Dancing_Script']">Boutique --}}
            </h2>
            <div class="flex flex-col gap-4">
                @forelse ($products as $item)
                    {{-- @dump($item) --}}
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
                    @livewire('components.product.product-card', [
                        'images' => ['https://example.com/image1.jpg'],
                        'title' => 'Les Chuchotements du Cœur',
                        'price' => 45.99,
                        'slug' => 'les-chuchotements-du-coeur',
                    ])
                @endforelse



            </div>



        </div>

    </section>
</div>
