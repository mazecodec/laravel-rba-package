<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\SendVerificationService;
use App\Services\User\UpdateUserProfileService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateProfileInformation extends Component
{
    public string $name = '';
    public string $email = '';

    public function mount(): void
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfileInformation(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $updateUserProfileService = new UpdateUserProfileService();
        $user = $updateUserProfileService($validated);

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function sendVerification(): void
    {
        $sendVerificationService = new SendVerificationService();

        if (!$sendVerificationService()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        session()->flash('status', 'verification-link-sent');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }

}
