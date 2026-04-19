<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    public string $name                  = '';
    public string $email                 = '';
    public string $password              = '';
    public string $password_confirmation = '';

    #[Title('Register')]
    public function render()
    {
        return view('livewire.register')->layout('layouts.guest');
    }

    protected function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        session()->regenerate();

        $this->redirect(route('dashboard'), navigate: true);
    }
}
