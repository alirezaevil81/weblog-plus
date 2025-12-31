<?php

namespace App\Livewire\Partials;

use App\Livewire\Traits\HasLogout;
use Livewire\Component;

class Header extends Component
{
    use HasLogout;

    public $headerNav;
    public $profileNav;

    public function mount(): void
    {
        $this->headerNav = [
            [
                "name" => 'خانه',
                "href" => route('home')
            ],
            [
                "name" => 'داشبورد',
                "href" => route('dashboard')
            ]
        ];
        if (auth()->check()) {
            $this->profileNav = [
                [
                    "name" => 'داشبورد',
                    "svg" => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />',
                    "href" => route('dashboard')
                ],
                [
                    "name" => 'پروفایل من',
                    "svg" => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>',
                    "href" => route('users.show', auth()->user()->name)
                ]
            ];
        }
    }


    public function render()
    {
        return view('livewire.partials.header');
    }
}
