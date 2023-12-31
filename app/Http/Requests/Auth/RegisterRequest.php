<?php

namespace App\Http\Requests\Auth;

use App\Domain\Enums\RoleUserTypes;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * This go before UserPolicy
         * check if the user is authorized to access to this request
         * @see UserPolicy::store
         * @see RegisteredUserController::store
         */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', new Rules\Enum(RoleUserTypes::class)],
        ];
    }
}
