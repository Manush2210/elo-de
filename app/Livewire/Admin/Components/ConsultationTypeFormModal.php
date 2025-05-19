<?php

namespace App\Livewire\Admin\Components;

use App\Models\ConsultationType;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConsultationTypeFormModal extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $name;
    public $description;
    public $price;
    public $image;
    public $currentImage;
    public $is_active = true;
    public $editMode = false;
    public $consultationTypeId;

    protected $listeners = ['openModal', 'closeModal'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0|max:999999.99',
        'image' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
    ];

    public function openModal($consultationTypeId = null)
    {
        $this->resetForm();
        $this->isOpen = true;

        if ($consultationTypeId) {
            $this->editMode = true;
            $this->consultationTypeId = $consultationTypeId;
            $this->loadConsultationType($consultationTypeId);
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function loadConsultationType($id)
    {
        $consultationType = ConsultationType::find($id);
        $this->name = $consultationType->name;
        $this->description = $consultationType->description;
        $this->price = $consultationType->price;
        $this->is_active = $consultationType->is_active;
        $this->currentImage = $consultationType->image;
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->currentImage;
        if ($this->image) {
            $imagePath = $this->image->store('consultation_types', 'public');
        }

        if ($this->editMode) {
            $consultationType = ConsultationType::find($this->consultationTypeId);
            $consultationType->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'is_active' => $this->is_active,
                'image' => $imagePath,
            ]);
            $message = 'Type de consultation mis à jour avec succès.';
        } else {
            // Pour les nouveaux types, on utilise l'ID comme ordre d'affichage
            $lastType = ConsultationType::orderBy('id', 'desc')->first();
            $sortOrder = $lastType ? $lastType->id + 1 : 1;

            ConsultationType::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'is_active' => $this->is_active,
                'image' => $imagePath,
                'sort_order' => $sortOrder,
            ]);
            $message = 'Type de consultation créé avec succès.';
        }

        $this->dispatch('consultation-type-saved', message: $message);
        $this->closeModal();
    }

    private function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'image', 'currentImage', 'editMode', 'consultationTypeId']);
        $this->is_active = true;
    }

    public function render()
    {
        return view('livewire.admin.components.consultation-type-form-modal');
    }
}
