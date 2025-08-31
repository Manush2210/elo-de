<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Setting;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin-app')]
class Settings extends Component
{
    public $email;
    public $contact_phone;
    public $fb_link;
    public $insta_link;

    public function mount()
    {
        $this->email = Setting::get('email', '');
        $this->contact_phone = Setting::get('contact_phone', '');
        $this->fb_link = Setting::get('fb_link', '');
        $this->insta_link = Setting::get('insta_link', '');
    }

    public function save()
    {
        $this->validate([
            'email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'fb_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
        ]);

        Setting::set('email', $this->email);
        Setting::set('contact_phone', $this->contact_phone);
        Setting::set('fb_link', $this->fb_link);
        Setting::set('insta_link', $this->insta_link);

        session()->flash('success_message', 'Paramètres sauvegardés.');
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
