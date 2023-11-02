<?php

namespace App\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use App\Services\Auth\ConfirmPasswordService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class ConfirmPassword extends Component
{
    #[Rule(['required', 'string'])]
    public string $password = '';

    private ConfirmPasswordService $confirmPasswordService;

    public function confirmPassword(): void
    {
        $this->validate();

        $confirmPasswordService = new ConfirmPasswordService();
        $confirmPasswordService($this->password);

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.pages.auth.confirm-password');
    }
}
