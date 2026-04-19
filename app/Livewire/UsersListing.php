<?php

namespace App\Livewire;

use Livewire\Component;

class UsersListing extends Component
{
    public $data = '';

     public function mount($data) {
        $this->data = $data;
     }
    public function render()
    {
        return view('livewire.users-listing');
    }
}
