<div class="relative bg-cover bg-center" style="background-image: url({{ asset('assets/images/19487.jpg') }});">
    <div class="bg-black/60">
        <div class="relative mx-auto py-24 container">
            <div class="max-w-4xl text-white text-left">
                <h1 class="drop-shadow-sm font-['Playfair_Display'] font-bold text-5xl md:text-7xl tracking-tight">
                    La voyance à votre service
                </h1>
                <p class="mt-6 max-w-2xl text-white/90 text-lg">Le meilleur de la voyance est à votre portée—offrant des
                    services extraordinaires avec le plus haut niveau de qualité.</p>

                {{-- <div class="mt-8 max-w-lg">

                    <div class="flex sm:flex-row flex-col items-stretch gap-3 bg-black/30 shadow-lg backdrop-blur-sm p-4 border border-white/20 rounded-lg">

                        <!-- Sélecteur de consultation piloté par Livewire -->
                        <div class="relative flex-1">
                            <select wire:model.live="selectedConsultation" id="consultation-select"
                                class="bg-white/10 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400 w-full h-full text-white appearance-none">
                                <option value="" disabled>Choisir une consultation</option>

                                @foreach ($consultations as $consultation)
                                    <option value="{{ $consultation }}" class="text-black">{{ $consultation }}</option>
                                @endforeach
                            </select>

                            <!-- Indicateur de chargement : s'affiche pendant la communication avec le serveur -->
                            <div wire:loading wire:target="selectedConsultation" class="right-0 absolute inset-y-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Bouton WhatsApp dynamique -->
                        <div>
                            <a href="{{ $this->whatsappLink }}"
                               target="_blank" rel="noopener"
                               @class([
                                   'w-full sm:w-auto inline-flex items-center justify-center bg-green-500 shadow-md px-6 py-3 rounded-lg text-white font-semibold transition',
                                   'opacity-50 cursor-not-allowed' => empty($selectedConsultation),
                                   'hover:bg-green-600' => !empty($selectedConsultation)
                               ])>

                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16.6 14c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1-.2.2-.6.7-.8.9-.1.1-.3.2-.5.1-.2-.1-.9-.3-1.8-1.1-.7-.6-1.1-1.4-1.3-1.6-.1-.2 0-.4.1-.5.1-.1.2-.2.4-.4.1-.1.2-.2.2-.4.1-.1.1-.3 0-.4-.1-.1-.6-1.5-.8-2-.2-.5-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.8 2.2 1 2.4c.1.1 1.5 2.3 3.7 3.2.5.2.9.4 1.2.5.5.2 1 .1 1.3-.1.4-.2 1.5-1.2 1.7-1.6.2-.4.2-.8.1-.9l-.3-.1zM12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
