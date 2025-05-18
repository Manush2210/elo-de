<?php

namespace App\Livewire\Admin\Pages;

use App\Models\PaymentMethod;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class PaymentMethods extends Component
{
    use WithPagination;

    public $search = '';
    public $showAll = false;

    public function render()
    {
        $query = PaymentMethod::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc');

        $paymentMethods = $query->paginate(10);
        $mobilePaymentMethods = $this->showAll ? $paymentMethods : $query->take(3)->get();

        return view('livewire.admin.pages.payment-methods', [
            'paymentMethods' => $paymentMethods,
            'mobilePaymentMethods' => $mobilePaymentMethods
        ]);
    }

    public function deletePaymentMethod($id)
    {
        $method = PaymentMethod::find($id);
        if ($method) {
            // Check if method is used in orders before deleting
            if ($method->orders()->count() > 0) {
                session()->flash('error', 'Ce moyen de paiement ne peut pas être supprimé car il est utilisé dans des commandes.');
                return;
            }

            $method->delete();
            session()->flash('message', 'Moyen de paiement supprimé avec succès.');
        }
    }
}
