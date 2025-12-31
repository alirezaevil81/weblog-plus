<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false; // برای ویژگی "مرا به خاطر بسپار"

    public function authenticate()
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // اگر اطلاعات غلط بود، یک خطای اعتبارسنجی برمی‌گردانیم
            throw ValidationException::withMessages([
                'form.email' => trans('auth.failed'),
            ]);
        }

        // جلوگیری از حملات Session Fixation
        session()->regenerate();
    }
}