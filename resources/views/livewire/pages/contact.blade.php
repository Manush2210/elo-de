<div>
    <section>
        <div class="youtube-vid container">
            <div class="my-4 font-[Poly] ">
                <h1 class="text-4xl font-bold text-gray-500">Contact</h1>
            </div>
            <div class="ytn-vid-int w-full relative mb-10" style="padding-top: 56.25%;">
                <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/b7gAzEIPm-w"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
    <section>
        <div class="container">

            <div class="max-w-lg">
                <div class=" mb-10">
                    <h2 class="text-2xl text-gray-600  text-left font-semibold  font-sans-serif">
                        Contactez-nous
                    </h2>
                    <p class="text-sm text-gray-500">Pour toute question ou assistance, n'hésitez pas à nous contacter
                        via ce formulaire.</p>
                </div>

                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-lime-100 border border-lime-400 text-lime-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <form wire:submit.prevent="submit">
                        @csrf
                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="name">Nom*</label>
                            <input type="text" class="border-0 bg-gray-200 text-black" id="name"
                                wire:model="name" required>
                            @error('name')
                                <span class="text-lime-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="email">Adresse e-mail *</label>
                            <input type="email" class="border-0 bg-gray-200 text-black" id="email"
                                wire:model="email" required>
                            @error('email')
                                <span class="text-lime-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Improved honeypot field - completely hidden from humans but visible to bots -->
                        <div class="hp-field"
                            style="opacity: 0; position: absolute; top: 0; left: 0; height: 0; width: 0; z-index: -1; overflow: hidden; pointer-events: none;">
                            <label for="email_confirm">Please leave this field empty</label>
                            <input type="text" name="email_confirm" id="email_confirm"
                                wire:model.defer="email_confirm" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="message">Message*</label>
                            <textarea id="message" class="border-0 bg-gray-200 text-black" wire:model="message" required></textarea>
                            @error('message')
                                <span class="text-lime-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="bg-lime-600 rounded-lg text-white px-3 py-2" type="submit">
                            <span wire:loading.remove wire:target="submit">Envoyer</span>
                            <span wire:loading wire:target="submit" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Envoi en cours...
                            </span>
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </section>
</div>
