<div>
    <section>
        <div class="youtube-vid container">
            <div class="my-4 font-[Poly] ">
                <h1 class="text-4xl font-bold text-gray-500">Contact</h1>
            </div>
            <div class="ytn-vid-int w-full relative mb-10" style="padding-top: 56.25%;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full"
                    src="https://www.youtube.com/embed/b7gAzEIPm-w"
                    title="YouTube video player"
                    frameborder="0"
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
                    <p class="text-sm text-gray-500">Pour toute question ou assistance, n'hésitez pas à nous contacter via ce formulaire.</p>
                </div>

                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <form >
                        @csrf
                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="name">Nom*</label>
                            <input type="text" class="border-0 bg-gray-200 text-black" id="name" wire:model="name" required>
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="email">Adresse e-mail *</label>
                            <input type="email" class="border-0 bg-gray-200 text-black" id="email" wire:model="email" required>
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4 flex flex-col">
                            <label class="text-gray-500 text-sm font-semibold" for="message">Message*</label>
                            <textarea id="message" class="border-0 bg-gray-200 text-black" wire:model="message" required></textarea>
                            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <button type="button"  wire:click="submit" class="bg-red-600 rounded-lg text-white px-3 py-2" type="submit">
                            <span wire:loading.remove>Envoyer</span>
                            <span wire:loading>Envoi en cours...</span>
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </section>
</div>
