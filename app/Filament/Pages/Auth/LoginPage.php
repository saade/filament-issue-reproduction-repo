<?php

namespace App\Filament\Pages\Auth;

use Filament\Http\Livewire\Auth\Login;

class LoginPage extends Login
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'test@example.com',
            'password' => 'test',
            'remember' => true,
        ]);
    }
}
