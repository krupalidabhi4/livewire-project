<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $data = ['name' => 'krupali', 'email' => 'krupali@gmail.com'];
        return view('livewire.users', ['data' => $data]);
    }
}
