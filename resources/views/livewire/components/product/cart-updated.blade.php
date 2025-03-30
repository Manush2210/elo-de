<div x-data="{ show: @entangle('show') }" x-show="show" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2" x-init="if (@js($autoClose)) {
        setTimeout(() => { show = false }, @js($autoCloseDelay));
    }"
    @closeToastAfterDelay.window="setTimeout(() => { show = false }, $event.detail)" class="fixed bottom-5 right-5 z-50"
    style="display: none;">
    <div class="w-full max-w-xs p-4 {{ $type === 'error' ? 'bg-red-50 text-red-800' : 'bg-green-50 text-green-800' }} rounded-lg shadow-md"
        role="alert">
        <div class="flex items-center space-x-2 mb-1">
            {{-- <span class="text-sm font-semibold">
                {{ $type === 'error' ? 'Erreur' : 'Succès' }}
            </span> --}}
            <div class="flex items-center">
                <div class="relative inline-block shrink-0">
                    @if ($type === 'error')
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-full {{ $type === 'error' ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500' }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </span>
                    @else
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-full {{ $type === 'error' ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500' }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    @endif
                </div>
                <div class="ms-3 text-sm font-normal">
                    {{ $message }}
                </div>
            </div>
            <button type="button" @click="show = false"
                class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center shrink-0 {{ $type === 'error' ? 'text-red-400 hover:text-red-900' : 'text-green-400 hover:text-green-900' }} rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8">
                <span class="sr-only">Fermer</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

    </div>
</div>
