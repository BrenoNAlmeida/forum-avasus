<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NovoForum extends Component
{
    public $openModal = false;
    public function render()
    {
        return view('livewire.novo-forum')->layout('layouts.guest');
    }

}
