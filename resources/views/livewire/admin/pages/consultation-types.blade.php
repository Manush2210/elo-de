<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-white">Types de consultation</h2>
                    <button wire:click="$dispatch('openModal')"
                        class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Nouveau type de consultation
                    </button>
                </div>

                <div class="mb-4">
                    <div class="relative">
                        <input type="text" wire:model.live="search"
                            placeholder="Rechercher un type de consultation..."
                            class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Vue mobile -->
                <div class="block sm:hidden space-y-4">
                    @forelse($consultationTypes as $type)
                        <div class="bg-gray-800 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-medium text-white">{{ $type->name }}</h3>
                                    <p class="text-teal-400 mt-1">{{ number_format($type->price, 2) }} €</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        wire:click="$dispatch('openModal', { consultationTypeId: {{ $type->id }} })"
                                        class="text-teal-400 hover:text-teal-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button wire:click="deleteConsultationType({{ $type->id }})"
                                        class="text-red-400 hover:text-red-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-400 py-4">
                            Aucun type de consultation trouvé
                        </div>
                    @endforelse
                </div>

                <!-- Vue desktop -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Prix
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                            @forelse($consultationTypes as $type)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white">{{ $type->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">{{ number_format($type->price, 2) }} €</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            wire:click="$dispatch('openModal', { consultationTypeId: {{ $type->id }} })"
                                            class="text-teal-400 hover:text-teal-300 mr-3">
                                            Modifier
                                        </button>
                                        <button wire:click="deleteConsultationType({{ $type->id }})"
                                            class="text-red-400 hover:text-red-300">
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-400">
                                        Aucun type de consultation trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $consultationTypes->links() }}
                </div>
            </div>
        </div>
    </div>

    <livewire:admin.components.consultation-type-form-modal />
</div>
