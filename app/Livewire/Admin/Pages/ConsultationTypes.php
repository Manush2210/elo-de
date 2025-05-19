<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ConsultationType;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class ConsultationTypes extends Component
{
    use WithPagination;

    public $search = '';
    public $showAll = false;

    public function render()
    {
        $query = ConsultationType::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('sort_order', 'asc');

        $consultationTypes = $query->paginate(10);
        $mobileConsultationTypes = $this->showAll ? $consultationTypes : $query->take(3)->get();

        return view('livewire.admin.pages.consultation-types', [
            'consultationTypes' => $consultationTypes,
            'mobileConsultationTypes' => $mobileConsultationTypes
        ]);
    }

    public function deleteConsultationType($id)
    {
        $type = ConsultationType::find($id);
        if ($type) {
            // Vérifier si le type est utilisé dans des rendez-vous
            if ($type->appointments()->count() > 0) {
                session()->flash('error', 'Ce type de consultation ne peut pas être supprimé car il est utilisé dans des rendez-vous.');
                return;
            }

            $type->delete();
            session()->flash('message', 'Type de consultation supprimé avec succès.');
        }
    }
}
