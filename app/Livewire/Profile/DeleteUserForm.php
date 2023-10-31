<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Rule;
use Livewire\Component;

class DeleteUserForm extends Component
{
    #[Rule(['required', 'string', 'current_password'])]
    public string $password = '';

    public function deleteUser(): void
    {
        $this->validate();

        tap(auth()->user(), fn () => auth()->logout())->delete();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }
}
