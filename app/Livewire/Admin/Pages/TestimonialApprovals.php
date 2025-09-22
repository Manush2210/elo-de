<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class TestimonialApprovals extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'pending';
    public $showModal = false;
    public $selectedTestimonial = null;

    public function render()
    {
        $testimonials = Testimonial::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('message', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter, function ($query) {
                if ($this->statusFilter === 'pending') {
                    $query->pending();
                } elseif ($this->statusFilter === 'approved') {
                    $query->approved();
                } elseif ($this->statusFilter === 'rejected') {
                    $query->rejected();
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $pendingCount = Testimonial::pending()->count();
        $approvedCount = Testimonial::approved()->count();
        $rejectedCount = Testimonial::rejected()->count();

        return view('livewire.admin.pages.testimonial-approvals', compact(
            'testimonials', 'pendingCount', 'approvedCount', 'rejectedCount'
        ));
    }

    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['status' => 'approved']);

        session()->flash('message', "Témoignage de {$testimonial->name} approuvé avec succès.");
    }

    public function reject($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['status' => 'rejected']);

        session()->flash('message', "Témoignage de {$testimonial->name} rejeté.");
    }

    public function restore($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['status' => 'pending']);

        session()->flash('message', "Témoignage de {$testimonial->name} remis en attente.");
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        session()->flash('message', 'Témoignage supprimé définitivement.');
    }

    public function viewDetails($id)
    {
        $this->selectedTestimonial = Testimonial::findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedTestimonial = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }
}
