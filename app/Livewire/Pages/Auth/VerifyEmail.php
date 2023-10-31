<?php

namespace App\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use App\Services\Auth\LogoutService;
use App\Services\Auth\SendVerificationService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class VerifyEmail  extends Component
{
    public function sendVerification(): void
    {
        $sendVerificationService = new SendVerificationService();

        if(!$sendVerificationService()) {
            $this->redirect(
                session('url.intended', RouteServiceProvider::HOME),
                navigate: true
            );
        }

        session()->flash('status', 'verification-link-sent');
    }

    public function logout(): void
    {
        $logoutService = new LogoutService();
        $logoutService();

        $this->redirect('/', navigate: true);
    }

    public function render() {
        return view('livewire.pages.auth.verify-email');
    }
}
