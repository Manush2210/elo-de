<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Product;

class Home extends Component
{

    public $products;

    public function mount()
    {
        $this->products = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
    }
    public function render()
    {
        return view('livewire.pages.home');
    }
}
