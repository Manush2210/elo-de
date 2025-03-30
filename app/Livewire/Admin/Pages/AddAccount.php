<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Account;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class AddAccount extends Component
{
    use WithPagination;

    public $search = '';
    public $showAll = false;

    protected $listeners = ['account-saved' => 'handleAccountSaved'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteAccount($id)
    {
        $account = Account::find($id);
        if ($account) {
            $account->delete();
            session()->flash('message', 'Compte bancaire supprimé avec succès.');
        }
    }

    public function handleAccountSaved($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        $query = Account::where('owner', 'like', '%' . $this->search . '%')
            ->orWhere('bank', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc');

        $accounts = $query->paginate(10);

        return view('livewire.admin.pages.add-account', [
            'accounts' => $accounts,
            'mobileAccounts' => $this->showAll ? $accounts : $accounts->take(3)
        ]);
    }
}
