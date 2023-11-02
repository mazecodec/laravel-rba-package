<?php

namespace App\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use App\Services\Auth\LoginService;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule(['required', 'string', 'email'])]
    public string $email = '';

    #[Rule(['required', 'string'])]
    public string $password = '';

    #[Rule(['boolean'])]
    public bool $remember = false;

    private LoginService $loginService;

    /**
     * @throws ValidationException
     */
    public function login(): void
    {
        $this->validate();

        $loginService = new LoginService();
        $loginService($this->email, $this->password, $this->remember);

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }


    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
