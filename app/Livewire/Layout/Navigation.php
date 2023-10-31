<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Navigation extends Component
{
    public function logout(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
}
