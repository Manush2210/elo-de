<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <header class="container">
        @livewire('components.carousel.carousel')
        <div class="relative py-16 mx-auto text-center max-w-4xl">
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <div class="w-16 h-1 bg-lime-500"></div>
            </div>

            <h2 class="font-['Playfair_Display'] text-gray-800">
                <span class="text-3xl font-light tracking-wide">Bienvenue chez</span>
                <span
                    class="block mt-4 text-5xl md:text-6xl font-bold bg-gradient-to-r from-lime-600 to-lime-400 bg-clip-text text-transparent">
                    GUIDANCE SPIRITUELLE
                </span>
            </h2>

            <div class="mt-10 relative">
                <div class="absolute -left-4 top-0 w-1 h-20 bg-lime-500/20"></div>
                <p class="text-gray-600 text-lg leading-loose mx-auto max-w-2xl">
                    Découvrez un univers de <span class="font-medium text-lime-600">bien-être spirituel</span> à travers
                    mes Oracles,
                    Porte-Bonheur et articles de lithothérapie. Chaque pièce est soigneusement sélectionnée pour vous
                    apporter
                    <span class="font-medium text-lime-600">harmonie</span>,
                    <span class="font-medium text-lime-600">guidance</span> et
                    <span class="font-medium text-lime-600">sérénité</span> dans votre quotidien.
                </p>
            </div>
        </div>

        {{-- Quick access button to shop, contact and meeting page on mobile --}}
        <div class="flex flex-wrap justify-center gap-2 mb-8 md:hidden">
            <a href="{{ route('shop') }}"
                class="bg-lime-500 text-white px-3 py-2 text-sm rounded-md hover:bg-lime-600 transition duration-300">Boutique</a>

            <a href="{{ route('contact') }}"
                class="bg-lime-500 text-white px-3 py-2 text-sm rounded-md hover:bg-lime-600 transition duration-300">Contact</a>

            <a href="{{ route('meeting') }}"
                class="bg-lime-500 text-white px-3 py-2 text-sm rounded-md hover:bg-lime-600 transition duration-300">Rendez-vous</a>

            @auth
                <a href="{{ route('order-history') }}"
                    class="bg-lime-500 text-white px-3 py-2 text-sm rounded-md hover:bg-lime-600 transition duration-300">Commandes</a>
            @endauth
        </div>
    </header>

    {{-- @dump(auth()->user()) --}}

    <section class="best-seller bg-gray-100 py-16">

        <div class="container text-center mx-auto">
            <h2 class="text-4xl mb-10 text-gray-600  font-semibold  font-['Dancing_Script']">Meilleures ventes

            </h2>
            @if ($products->isNotEmpty())

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0">


                    @foreach ($products as $item)
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
                    @endforeach
                </div>
                <div class="flex justify-center mt-6">

                    <a href="{{ route('shop') }}"
                        class="bg-lime-500 inline-block  my-8 text-white px-4 py-2 rounded-md hover:bg-lime-600 transition duration-300">Voir
                        la Boutique</a>

                </div>
            @endif


            @if ($products->isEmpty())
                <div class="text-center py-8">
                    <h3 class="text-sm text-gray-600">Aucun produit</h3>
                    <p class="text-gray-500">Nous n'avons pas trouvé de produits correspondant à votre recherche.</p>
                </div>
            @endif
        </div>




    </section>

    {{-- ============================================================== --}}
    {{-- Section Témoignages                                            --}}
    {{-- ============================================================== --}}
    <section class="testimonies bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl text-center font-semibold text-gray-800 mb-12">Ce que disent nos clients</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Témoignage de Marie --}}
                <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-lime-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-xl font-bold">M</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Les oracles de bienveillance et d'amour m'accompagnent chaque jour.
                        Ils m'aident à trouver de la clarté"</p>
                    <div class="flex items-center justify-center">
                        <span class="text-lime-500 font-medium">Marie</span>
                    </div>
                </div>

                {{-- Témoignage de Christelle --}}
                <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-lime-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-xl font-bold">C</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Chaque tirage est une occasion d'en apprendre davantage sur moi-même
                        et de trouver un équilibre"</p>
                    <div class="flex items-center justify-center">
                        <span class="text-lime-500 font-medium">Christelle</span>
                    </div>
                </div>

                {{-- Témoignage de Franck --}}
                <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-lime-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-xl font-bold">F</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Franchement, tirer une carte, ça m'aide à y voir plus clair et à
                        prendre du recul sur pas mal de choses."</p>
                    <div class="flex items-center justify-center">
                        <span class="text-lime-500 font-medium">Franck</span>
                    </div>
                </div>

                {{-- Témoignage de Mélissa --}}
                <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-lime-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-xl font-bold">M</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Génial ! Livraison rapide !"</p>
                    <div class="flex items-center justify-center">
                        <span class="text-lime-500 font-medium">Mélissa</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about mb-5 bg-white">
        <div class="container max-w-4xl mx-auto py-12 px-4">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-semibold text-gray-800">Qui suis-je?</h2>
                <div class="w-24 h-1 bg-lime-500 mx-auto mt-4"></div>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-medium text-gray-800 mb-4">Mon Don</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Grâce à ma clairvoyance, je peux identifier les bons numéros du loto ainsi que le site où vous
                        aurez le plus de chances de gagner. La voyance est un atout précieux pour prédire les tirages.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-medium text-gray-800 mb-4">Mon Éthique</h3>
                    <p class="text-gray-600 leading-relaxed">
                        La datation précise d'un événement reste un défi pour tout voyant. Si un clairvoyant est en
                        mesure de le faire, il agit selon son éthique. Lors de la consultation, je vous révélerai les
                        numéros gagnants ainsi que la plateforme idéale pour jouer.
                    </p>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-gray-500 italic">
                    "En retour, après votre gain, vous respecterez votre engagement."
                </p>
            </div>
        </div>
    </section>


</div>
