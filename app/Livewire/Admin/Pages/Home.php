<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[
    Layout('components.layouts.admin-app')
]
class Home extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.home');
    }
}
