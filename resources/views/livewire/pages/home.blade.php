<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    @livewire('components.heros')

    {{-- @dump(auth()->user()) --}}

    <section class="bg-white py-20">
        <div class="mx-auto container">

            <div class="mb-12 text-center">
                <h2 class="font-extrabold text-gray-800 text-4xl sm:text-5xl">
                    Ein intuitives und personalisiertes Führungserlebnis
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600 text-xl">
                    Entdecken Sie eine Plattform, die Sie auf Ihrem Lebensweg begleiten soll.
                </p>
            </div>

            <div class="items-center gap-12 grid grid-cols-1 md:grid-cols-2">
                <!-- Colonne de l'image -->
                <div class="shadow-2xl rounded-lg overflow-hidden">
                    <img src="{{ asset('assets/images/digi-v.jpg') }}" alt="Die Welt von Sani Sterne Vohersagen"
                        class="w-full h-auto object-center object-cover hover:scale-105 transition-transform duration-500 ease-in-out transform">
                </div>

                <!-- Colonne des fonctionnalités -->
                <div class="space-y-8">
                    <div>
                        <h3 class="mb-4 font-bold text-cyan-700 text-2xl">Das erwartet Sie auf unserer Plattform:</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Wir haben einen sicheren und wohlwollenden Raum geschaffen, um Ihnen klare Führungswerkzeuge
                            und exklusive Ressourcen zur Verfügung zu stellen. Navigieren Sie einfach und finden Sie die Antworten, die
                            Sie suchen.
                        </p>
                    </div>

                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="flex-shrink-0">
                                <span
                                    class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12 text-cyan-600">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800 text-lg">Personalisierte Führung</h4>
                                <p class="mt-1 text-gray-600">Profitieren Sie von maßgeschneiderten Ratschlägen und Beratungen,
                                    die auf Ihre einzigartige Situation zugeschnitten sind, durch unsere interaktiven Werkzeuge.</p>
                            </div>
                        </li>

                        <li class="flex items-start">
                            <div class="flex-shrink-0">
                                <span
                                    class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12 text-cyan-600">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.33 11.162A3.001 3.001 0 016.5 6h11a3.001 3.001 0 012.168 5.162l-6.67 7.623A3 3 0 016.5 18H5a2 2 0 01-2-2v-2.5a3 3 0 01.33-1.338z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800 text-lg">Online-Kartenlegungen</h4>
                                <p class="mt-1 text-gray-600">Greifen Sie jederzeit auf interaktive Kartenlegungen zu,
                                    um sofortige Klarheit zu erhalten.</p>
                            </div>
                        </li>



                        <li class="flex items-start">
                            <div class="flex-shrink-0">
                                <span
                                    class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12 text-cyan-600">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.523 5.754 19 7.5 19s3.332-.477 4.5-1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.523 18.246 19 16.5 19c-1.746 0-3.332-.477-4.5-1.253" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800 text-lg">Ressourcen und Artikel</h4>
                                <p class="mt-1 text-gray-600">Vertiefen Sie Ihr Wissen mit unserer Bibliothek
                                    von Artikeln, Tipps und exklusiven Ressourcen.</p>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-10">
                        <a href="{{ route('meeting') }}"
                            class="inline-block inline-flex items-center gap-3 bg-cyan-600 hover:bg-cyan-700 shadow-lg px-8 py-3 rounded-lg font-bold text-white transition-all hover:-translate-y-1 duration-300 transform">
                            <svg class="w-5 h-5 text-white animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Das Erlebnis genießen.
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Section Types de consultation -->
    <section class="bg-white py-16">
        <div class="mx-auto container">
            <div class="mb-8 text-center">
                <h2 class="font-extrabold text-gray-800 text-3xl">Arten von Beratungen</h2>
                <p class="mt-2 text-gray-600">Wählen Sie die Art der Sitzung, die zu Ihnen passt</p>
            </div>

            @if (!empty($consultationTypes) && $consultationTypes->isNotEmpty())
                <div class="gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($consultationTypes as $type)
                        <div class="shadow hover:shadow-lg p-6 border rounded-lg transition">
                            @if ($type->image)
                                <div class="mb-4 rounded w-full h-44 overflow-hidden">
                                    <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->name }}"
                                        class="w-full h-full object-cover">
                                </div>
                            @endif
                            <h3 class="font-semibold text-gray-800 text-xl">{{ $type->name }}</h3>
                            <p class="mt-2 text-gray-600">{{ Str::limit($type->description, 120) }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <div class="font-bold text-cyan-700 text-lg">
                                    {{ number_format($type->price, 2, ',', ' ') }} €</div>
                                <a href="{{ route('meeting') }}?type={{ $type->id }}"
                                    class="bg-cyan-600 hover:bg-cyan-700 px-4 py-2 rounded text-white">Buchen</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center">Aucun type de consultation disponible pour le moment.</p>
            @endif
        </div>
    </section>

    <!-- Section Derniers Produits -->
    {{-- <section class="bg-white py-16">
        <div class="mx-auto container">
            <div class="mb-8 text-center">
                <h2 class="font-extrabold text-gray-800 text-3xl">Neueste Produkte</h2>
                <p class="mt-2 text-gray-600">Entdecken Sie unsere neuesten Produkte</p>
            </div>

            @if (!empty($products) && $products->isNotEmpty())
                <div class="gap-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    @foreach ($products as $item)
                        @livewire(
                            'components.product.product-card',
                            [
                                'images' => $item->images,
                                'title' => $item->name,
                                'price' => $item->price,
                                'slug' => $item->slug,
                                'product' => $item,
                            ],
                            key( $item->id )
                        )
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center">Derzeit keine Produkte verfügbar.</p>
            @endif
        </div>
    </section> --}}




    <section class="bg-slate-50 py-16 sm:py-24 about">
        <div class="mx-auto px-4 max-w-5xl container">

            <!-- Titre de la section -->
            <div class="mb-12 text-center">
                <h2 class="font-extrabold text-gray-900 text-3xl sm:text-4xl">
                    Meine Berufung: Sie auf Ihrem Lebensweg erleuchten
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600 text-lg">
                    Entdecken Sie einen Ansatz der Wahrsagung, der auf Zuhören, Respekt und Wohlwollen basiert.
                </p>
            </div>

            <div class="items-center gap-12 grid grid-cols-1 lg:grid-cols-5">

                <!-- Colonne Image (Très important pour la confiance) -->
                <div class="lg:col-span-2">
                    <div class="shadow-2xl rounded-xl aspect-[4/5] overflow-hidden">
                        <!-- Remplacez par une photo professionnelle de vous-même -->
                        <img class="w-full h-full object-center object-cover"
                            src="{{asset('assets/images/bougie.jpg')}}"
                            alt="Portrait de votre nom, voyant et guide spirituel">
                    </div>
                </div>

                <!-- Colonne Contenu -->
                <div class="lg:col-span-3">
                    <div class="space-y-8">
                        <div>
                            <h3 class="mb-3 font-bold text-cyan-700 text-2xl">Wer bin ich?</h3>
                            <p class="text-gray-700 leading-relaxed">
                                Leidenschaftlich von diversen Künsten und persönlicher Entwicklung inspiriert, habe ich mein Leben der Verfeinerung
                                meiner Hellsichtsfähigkeit gewidmet, um klare und nützliche Führung anzubieten. Mein
                                Ziel ist nicht, eine unveränderliche Zukunft vorherzusagen, sondern Ihnen die Werkzeuge zu geben, um
                                Ihre Gegenwart zu verstehen und die Zukunft zu gestalten, die zu Ihnen passt.
                            </p>
                        </div>

                        <!-- Ma Mission -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span
                                    class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12 text-cyan-600">
                                    <!-- Icône pour la mission/vision -->
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639l7.5-10.5a.5.5 0 01.832.664l-6.5 9.152 6.5 9.152a.5.5 0 01-.832.664l-7.5-10.5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12.036 12.322a1.012 1.012 0 010-.639l7.5-10.5a.5.5 0 01.832.664l-6.5 9.152 6.5 9.152a.5.5 0 01-.832.664l-7.5-10.5z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800 text-lg">Meine Mission</h4>
                                <p class="mt-1 text-gray-600">Sie in Klarheit und Vertrauen begleiten, indem Sie
                                    die dunklen Bereiche erleuchte und Ihr Potenzial enthülle, um Ihnen zu helfen,
                                    informierte Entscheidungen zu treffen.</p>
                            </div>
                        </div>

                        <!-- Mon Éthique -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span
                                    class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12 text-cyan-600">
                                    <!-- Icône pour l'éthique/confiance -->
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286zm0 13.036h.008v.008h-.008v-.008z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800 text-lg">Meine Ethik</h4>
                                <p class="mt-1 text-gray-600">Jede Beratung ist ein vertraulicher Austausch, der geführt wird,
                                    ohne Urteile. Ich verpflichte mich zu vollständiger Ehrlichkeit, einschließlich der Grenzen meiner
                                    Praxis, und ich praktiziere keine Form von Gefälligkeit.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Citation inspirante -->
                    <div class="mt-10 pl-4 border-cyan-500 border-l-4">
                        <p class="text-gray-600 italic">
                            "Mein größter Wunsch ist, dass Sie unsere Sitzung mit mehr Gelassenheit und
                            Kraft verlassen, um voranzukommen."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16 testimonies">
        <div class="mx-auto container">
            <h2 class="mb-12 font-semibold text-gray-800 text-4xl text-center">Das sagen unsere Kunden</h2>

            @if (!empty($testimonials) && $testimonials->isNotEmpty())
                <div class="gap-8 grid md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-white shadow-lg p-6 rounded-lg hover:scale-105 transition duration-300 transform">
                            <div class="flex justify-center mb-4">
                                @if ($testimonial->photo)
                                    <div class="rounded-full w-12 h-12 overflow-hidden">
                                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->name }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="flex justify-center items-center bg-cyan-500 rounded-full w-12 h-12">
                                        <span class="font-bold text-white text-xl">{{ $testimonial->initial }}</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Rating avec étoiles --}}
                            <div class="flex justify-center mb-3">
                                <div class="text-yellow-400 text-lg">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimonial->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            <p class="mb-4 text-gray-600">"{{ $testimonial->message }}"</p>

                            <div class="flex justify-center items-center">
                                <span class="font-medium text-cyan-500">{{ $testimonial->name }}</span>
                            </div>

                            {{-- Date du témoignage --}}
                            <div class="flex justify-center items-center mt-2">
                                <span class="text-gray-400 text-sm">{{ $testimonial->formatted_date_fr }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Fallback si aucun témoignage en base --}}
                <div class="gap-8 grid md:grid-cols-2 lg:grid-cols-4">
                    {{-- Témoignage de Marie --}}
                    <div class="bg-white shadow-lg p-6 rounded-lg hover:scale-105 transition duration-300 transform">
                        <div class="flex justify-center mb-4">
                            <div class="flex justify-center items-center bg-cyan-500 rounded-full w-12 h-12">
                                <span class="font-bold text-white text-xl">M</span>
                            </div>
                        </div>
                        <div class="flex justify-center mb-3">
                            <div class="text-yellow-400 text-lg">★★★★★</div>
                        </div>
                        <p class="mb-4 text-gray-600">"Die Orakel der Güte und Liebe begleiten mich jeden Tag.
                            Sie helfen mir, Klarheit zu finden"</p>
                        <div class="flex justify-center items-center">
                            <span class="font-medium text-cyan-500">Marie</span>
                        </div>
                    </div>

                    {{-- Témoignage de Christelle --}}
                    <div class="bg-white shadow-lg p-6 rounded-lg hover:scale-105 transition duration-300 transform">
                        <div class="flex justify-center mb-4">
                            <div class="flex justify-center items-center bg-cyan-500 rounded-full w-12 h-12">
                                <span class="font-bold text-white text-xl">C</span>
                            </div>
                        </div>
                        <div class="flex justify-center mb-3">
                            <div class="text-yellow-400 text-lg">★★★★★</div>
                        </div>
                        <p class="mb-4 text-gray-600">"Jede Legung ist eine Gelegenheit, mehr über mich selbst zu erfahren
                            und ein Gleichgewicht zu finden"</p>
                        <div class="flex justify-center items-center">
                            <span class="font-medium text-cyan-500">Christelle</span>
                        </div>
                    </div>

                    {{-- Témoignage de Franck --}}
                    <div class="bg-white shadow-lg p-6 rounded-lg hover:scale-105 transition duration-300 transform">
                        <div class="flex justify-center mb-4">
                            <div class="flex justify-center items-center bg-cyan-500 rounded-full w-12 h-12">
                                <span class="font-bold text-white text-xl">F</span>
                            </div>
                        </div>
                        <div class="flex justify-center mb-3">
                            <div class="text-yellow-400 text-lg">★★★★☆</div>
                        </div>
                        <p class="mb-4 text-gray-600">"Ehrlich gesagt, eine Karte zu ziehen, hilft mir, klarer zu sehen und
                            Abstand zu vielen Dingen zu gewinnen."</p>
                        <div class="flex justify-center items-center">
                            <span class="font-medium text-cyan-500">Franck</span>
                        </div>
                    </div>

                    {{-- Témoignage de Mélissa --}}
                    <div class="bg-white shadow-lg p-6 rounded-lg hover:scale-105 transition duration-300 transform">
                        <div class="flex justify-center mb-4">
                            <div class="flex justify-center items-center bg-cyan-500 rounded-full w-12 h-12">
                                <span class="font-bold text-white text-xl">M</span>
                            </div>
                        </div>
                        <div class="flex justify-center mb-3">
                            <div class="text-yellow-400 text-lg">★★★★★</div>
                        </div>
                        <p class="mb-4 text-gray-600">"Großartig! Schnelle Lieferung!"</p>
                        <div class="flex justify-center items-center">
                            <span class="font-medium text-cyan-500">Mélissa</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Section Formulaire de témoignage -->
    <section class="bg-white py-16">
        <div class="mx-auto container">
            <div class="mb-12 text-center">
                <h2 class="font-semibold text-gray-800 text-4xl">Teilen Sie Ihre Erfahrung</h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600 text-lg">
                    Ihre Meinung ist uns wichtig. Hinterlassen Sie uns eine Bewertung und helfen Sie anderen, unsere Dienstleistungen zu entdecken.
                </p>
            </div>

            @if (session()->has('testimonial_success'))
                <div class="bg-green-100 mb-6 px-4 py-3 border border-green-400 rounded text-green-700 text-center">
                    {{ session('testimonial_success') }}
                </div>
            @endif

            @if (session()->has('testimonial_error'))
                <div class="bg-red-100 mb-6 px-4 py-3 border border-red-400 rounded text-red-700 text-center">
                    {{ session('testimonial_error') }}
                </div>
            @endif

            <div class="mx-auto max-w-2xl">
                <form wire:submit.prevent="submitTestimonial" class="bg-gray-50 shadow-lg p-8 rounded-lg">
                    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 mb-6">
                        <div>
                            <label for="testimonial_name" class="block mb-2 font-medium text-gray-700 text-sm">
                                Ihr Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="testimonial_name" wire:model="testimonial_name"
                                class="bg-white px-4 py-3 border border-gray-300 focus:border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full"
                                placeholder="Ihr Vorname">
                            @error('testimonial_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="testimonial_rating" class="block mb-2 font-medium text-gray-700 text-sm">
                                Ihre Bewertung <span class="text-red-500">*</span>
                            </label>
                            <select id="testimonial_rating" wire:model="testimonial_rating"
                                class="bg-white px-4 py-3 border border-gray-300 focus:border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full">
                                <option value="">Wählen Sie eine Bewertung</option>
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }} Stern{{ $i > 1 ? 'e' : '' }}
                                        @for ($j = 1; $j <= $i; $j++) ★ @endfor
                                    </option>
                                @endfor
                            </select>
                            @error('testimonial_rating')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="testimonial_message" class="block mb-2 font-medium text-gray-700 text-sm">
                            Ihre Bewertung <span class="text-red-500">*</span>
                        </label>
                        <textarea id="testimonial_message" wire:model="testimonial_message" rows="5"
                            class="bg-white px-4 py-3 border border-gray-300 focus:border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full"
                            placeholder="Teilen Sie Ihre Erfahrung mit uns..."></textarea>
                        @error('testimonial_message')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="testimonial_email" class="block mb-2 font-medium text-gray-700 text-sm">
                            E-Mail (optional)
                        </label>
                        <input type="email" id="testimonial_email" wire:model="testimonial_email"
                            class="bg-white px-4 py-3 border border-gray-300 focus:border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full"
                            placeholder="ihre@email.com">
                        @error('testimonial_email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <small class="text-gray-500">Ihre E-Mail wird nicht veröffentlicht</small>
                    </div>

                    <!-- Vérification anti-spam par calcul mathématique -->
                    <div class="mb-6">
                        <label for="math_user_answer" class="block mb-2 font-medium text-gray-700 text-sm">
                            Anti-Spam-Verifizierung <span class="text-red-500">*</span>
                        </label>
                        <div class="bg-gray-50 mb-3 p-4 border border-gray-300 rounded-md">
                            <div class="flex justify-center items-center gap-3">
                                <span class="font-bold text-gray-800 text-2xl">{{ $this->mathQuestion }}</span>
                                <button type="button" wire:click="refreshMathChallenge"
                                    class="ml-3 text-cyan-600 hover:text-cyan-800" title="Neue Berechnung generieren">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <input type="text" id="math_user_answer" wire:model="math_user_answer"
                            class="bg-white px-4 py-3 border border-gray-300 focus:border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full"
                            placeholder="Ihre Antwort..." autocomplete="off">
                        @error('math_user_answer')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <small class="text-gray-500">Lösen Sie diese Aufgabe, um zu beweisen, dass Sie kein Roboter sind</small>
                    </div>

                    <!-- Protection anti-spam -->
                    <div class="hidden">
                        <input type="text" wire:model="testimonial_honeypot" tabindex="-1">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-cyan-600 hover:bg-cyan-700 px-8 py-3 rounded-lg font-bold text-white hover:scale-105 transition duration-300 transform">
                            <svg class="inline mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Meine Bewertung einreichen
                        </button>
                    </div>

                    <div class="mt-4 text-center">
                        <small class="text-gray-500">
                            Ihre Bewertung wird vor der Veröffentlichung überprüft, um ihre Relevanz sicherzustellen.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Message de bienvenue personnel -->
    <section class="bg-gradient-to-br from-cyan-50 to-blue-50 py-16">
        <div class="mx-auto container">
            <div class="mx-auto max-w-4xl">
                <div class="bg-white shadow-xl p-8 md:p-12 border border-cyan-100 rounded-2xl text-center">
                    <div class="mb-6">
                        <div class="inline-flex justify-center items-center bg-cyan-100 mx-auto rounded-full w-16 h-16">
                            <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-6 text-gray-700 leading-relaxed">
                        <p class="text-lg md:text-xl">
                            <span class="font-medium text-cyan-800">Vielen Dank, dass Sie sich entschieden haben, diesen Raum zu besuchen.</span>
                        </p>
                        <p class="text-lg md:text-xl">
                            Ein Ort, der geschaffen wurde, um Sie willkommen zu heißen, Ihnen zuzuhören und vor allem Sie mit Respekt, Genauigkeit und Ehrlichkeit zu erleuchten.
                        </p>
                        <p class="text-lg md:text-xl">
                            Hier wird jede Seele mit Wohlwollen empfangen, ohne Urteile. Ob Sie dringend Antworten brauchen, sentimentale, berufliche oder spirituelle Fragen haben oder einfach nur möchten, dass es klarer wird, <span class="font-medium text-cyan-800">Sie sind hier zu Hause.</span>
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-cyan-200">
                        <p class="font-medium text-gray-800 text-xl">
                            Namaste 🙏
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
