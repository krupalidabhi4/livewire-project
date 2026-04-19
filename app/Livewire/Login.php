<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public string $email    = '';
    public string $password = '';
    public bool   $remember = false;

    #[Title('Login')]
    public function render()
    {
        return view('livewire.login')->layout('layouts.guest');
    }

    protected function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            $this->redirect(route('dashboard'), navigate: true);
        } else {
            $this->addError('email', 'These credentials do not match our records.');
        }
    }
}
