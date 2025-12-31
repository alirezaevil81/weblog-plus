<?php

namespace App\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUser extends Component
{
    use WithPagination;

    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.pages.users.show-user', [
            'posts' => $this->user->posts()->latest()->paginate(4)
        ])->layoutData([
            'title' => $this->user->name,
            'sidebar' => true
        ]);
    }
}
