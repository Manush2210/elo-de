<?php

namespace App\Livewire\Admin\Components;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProductFormModal extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $image;
    public $tempImages = [];
    public $is_active = true;
    public $editMode = false;
    public $productId;
    public $slug;

    protected $listeners = ['openModal', 'closeModal'];

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
        'slug' => 'nullable'
    ];

    public function openModal($productId = null)
    {
        $this->resetForm();
        $this->isOpen = true;
  if ($productId) {
                    $this->editMode = true;
            $this->productId = $productId;
            $this->loadProduct($productId);
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function loadProduct($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->is_active = $product->is_active;
        $this->tempImages = array_map(function($image) {
            return $image;
        }, $product->images ?? []);
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        if ($this->image && count($this->tempImages) < 5) {
            $this->tempImages[] = $this->image;
            $this->image = null;
        }
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function removeImage($index)
    {
        unset($this->tempImages[$index]);
        $this->tempImages = array_values($this->tempImages);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tempImages' => 'required|array|min:1|max:5',
        ]);

        $uploadedImages = [];
        foreach ($this->tempImages as $image) {
            if (is_string($image)) {
                $uploadedImages[] = $image;
            } else {
                $uploadedImages[] = $image->store('products', 'public');
            }
        }

        if ($this->editMode) {
            $product = Product::find($this->productId);
            $product->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'images' => $uploadedImages,
                'is_active' => $this->is_active,
            ]);
            $message = 'Produit mis à jour avec succès.';
        } else {
            Product::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'images' => $uploadedImages,
                'is_active' => $this->is_active,
            ]);
            $message = 'Produit créé avec succès.';
        }

        $this->dispatch('product-saved', message: $message);
        $this->closeModal();
    }

    private function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'stock', 'tempImages', 'image', 'editMode', 'productId', 'slug']);
        $this->is_active = true;
    }

    public function render()
    {
        return view('livewire.admin.components.product-form-modal');
    }
}

