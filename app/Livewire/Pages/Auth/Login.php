<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        if (app()->hasDebugModeEnabled()) sleep(1);
        $this->form->authenticate();

        // هدایت کاربر به صفحه‌ای که قصد داشت برود (یا داشبورد)
        $this->redirectIntended('/',navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
