<?php

namespace App\Livewire\Traits;

trait HasLogout
{
    public function logout()
    {
        if (!auth()->check()){
            $this->redirectIntended(route('login'),navigate: true);
        }

        if (app()->hasDebugModeEnabled()) sleep(1);

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(route('home'), navigate: true);
    }
}
