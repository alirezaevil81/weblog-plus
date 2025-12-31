<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function save()
    {
        if (app()->hasDebugModeEnabled()) sleep(1);
        $this->form->store();

        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}