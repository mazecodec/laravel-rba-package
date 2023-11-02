<?php

namespace App\Livewire\Pages\Auth;

use App\Exceptions\ResetPasswordException;
use App\Services\Auth\ResetPasswordService;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.guest')]
class ResetPassword extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(string $token): void
    {
        $this->token = $token;
        $this->email = request()->string('email');
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            $resetPasswordService = new ResetPasswordService();
            $resetPasswordService(
                $this->email,
                $this->password,
                $this->password_confirmation,
                $this->token
            );
        } catch (ResetPasswordException $e) {
            $this->addError('email', __($e->getMessage()));

            return;
        }

        $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.reset-password');
    }
}
