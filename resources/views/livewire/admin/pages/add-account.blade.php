<div class="flex-1 px-2 sm:px-0 overflow-hidden max-w-4xl ">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-3xl font-extralight text-white/50">Comptes Bancaires</h3>
    </div>

    <div class="flex gap-4 my-4">
        <div class="relative">
            <input type="text" wire:model.live="search" placeholder="Rechercher un compte..."
                class="bg-gray-900 text-white rounded-md pl-10 pr-4 py-2 w-64">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <button wire:click="$dispatch('openModal')"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Vue Desktop -->
    <div class="hidden md:block bg-gray-800 rounded-lg shadow  overflow-hidden">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Propriétaire</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Banque</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">IBAN</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">SWIFT</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Pays</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
                @foreach ($accounts as $account)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $account->owner }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $account->bank }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $account->iban }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $account->swift }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $account->country }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($account->is_active)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Actif
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Inactif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex gap-2">
                                <button wire:click="$dispatch('openModal', { accountId: {{ $account->id }} })"
                                    class="text-blue-400 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button wire:click="deleteAccount({{ $account->id }})"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')"
                                    class="text-red-400 hover:text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-700">
            {{ $accounts->links() }}
        </div>
    </div>

    <!-- Vue Mobile -->
    <div class="md:hidden space-y-3">
        @foreach ($mobileAccounts as $account)
            <div class="rounded-lg shadow-sm overflow-hidden">
                <div class="bg-blue-500 h-2"></div>
                <div class="p-4">
                    <!-- Date et Statut -->
                    <div class="flex justify-between items-center text-sm mb-3">

                        @if ($account->is_active)
                            <span class="px-2 py-1 bg-green-50 text-green-700 rounded-full text-xs font-medium">
                                Actif
                            </span>
                        @else
                            <span class="px-2 py-1 bg-red-50 text-red-700 rounded-full text-xs font-medium">
                                Inactif
                            </span>
                        @endif
                    </div>

                    <!-- Info Compte -->
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-white">Propriétaire</span>
                            <span class="font-medium text-gray-500">{{ $account->owner }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white">Banque</span>
                            <span class="text-gray-500">{{ $account->bank }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white">IBAN</span>
                            <span class="text-gray-500">{{ $account->iban }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white">SWIFT</span>
                            <span class="text-gray-500">{{ $account->swift }}</span>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-2 pt-3 border-t border-gray-100 mt-3">
                        <button wire:click="$dispatch('openModal', { accountId: {{ $account->id }} })"
                            class="inline-flex items-center px-3 py-1.5 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifier
                        </button>
                        <button wire:click="deleteAccount({{ $account->id }})"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')"
                            class="inline-flex items-center px-3 py-1.5 border border-red-600 text-red-600 rounded-md hover:bg-red-50 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        @if (!$showAll && $accounts->count() > 3)
            <button wire:click="$set('showAll', true)"
                class="w-full bg-gray-50 text-gray-700 py-3 rounded-lg hover:bg-gray-100 transition text-sm font-medium border border-gray-200">
                Voir plus de comptes ({{ $accounts->count() - 3 }} restants)
            </button>
        @endif
    </div>

    <livewire:admin.components.account-form-modal />
</div>
