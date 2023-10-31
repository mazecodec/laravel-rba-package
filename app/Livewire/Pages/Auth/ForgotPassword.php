<?php

namespace App\Livewire\Pages\Auth;

use App\Exceptions\ForgotPasswordException;
use App\Services\Auth\ForgotPasswordService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class ForgotPassword extends Component
{
    #[Rule(['required', 'string', 'email'])]
    public string $email = '';

    private ForgotPasswordService $forgotPasswordService;

    public function sendPasswordResetLink(): void
    {
        $this->validate();

        try {
            $forgotPasswordService = new ForgotPasswordService();
            $forgotPasswordService($this->email);
        } catch (ForgotPasswordException $e) {
            $this->addError('email', __($e->getMessage()));

            return;
        }

        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.pages.auth.forgot-password');
    }
}
