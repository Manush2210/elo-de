<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class AddProduct extends Component
{
    use WithPagination;

    public $search = '';
    public $showAll = false;  // Nouvelle propriété

    protected $listeners = ['product-saved' => 'handleProductSaved'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Produit supprimé avec succès.');
        }
    }

    public function handleProductSaved($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        $query = Product::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc');

        $products = $query->paginate(10);

        return view('livewire.admin.pages.add-product', [
            'products' => $products,
            'mobileProducts' => $this->showAll ? $products : $products->take(3)
        ]);
    }
}
