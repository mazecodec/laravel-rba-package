<?php

namespace App\Livewire\Profile;

use App\Services\User\DeleteUserService;
use Livewire\Attributes\Rule;
use Livewire\Component;

class DeleteUserForm extends Component
{
    #[Rule(['required', 'string', 'current_password'])]
    public string $password = '';

    public function deleteUser(): void
    {
        $this->validate();

        $deleteUserService = new DeleteUserService();
        $deleteUserService();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }
}
