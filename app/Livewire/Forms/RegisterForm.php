<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use function auth;

class RegisterForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|max:255|unique:users,email')]
    public $email = '';

    #[Validate('required|string|min:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'image' => 'https://img.icons8.com/nolan/64/user-default.png',
            'bio' => '',
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);
    }
}
