<?php

namespace App\Livewire\Components\Product;

use Livewire\Component;

class ProductListView extends Component
{
    public $images;
    public $title;
    public $price;

    public $slug;
    public $description;

    public function mount($images, $title, $price,$description)
    {
        $this->images = $images;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }
    public function addToCart()
    {
        session()->flash('message', 'Produit ajouté au panier.');
    }

    public function render()
    {
        return view('livewire.components.product.product-list-view');
    }
}
