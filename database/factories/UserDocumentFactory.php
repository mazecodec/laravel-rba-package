<?php

namespace Database\Factories;

use App\Domain\Enums\DocumentFileTypes;
use App\Domain\Enums\StatusType;
use App\Models\DgtDocumentRequirement;
use App\Models\DgtProcedure;
use App\Models\User;
use App\Models\UserDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserDocument>
 */
class UserDocumentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(DocumentFileTypes::toArray()),
            'type' => fake()->fileExtension(),
            'extension' => fake()->fileExtension(),
            'path' => fake()->filePath(),
            'size' => fake()->randomElement([fake()->randomDigit, fake()->randomDigit]),
            'status' => fake()->randomElement(StatusType::toArray()),
            'uploaded_at' => fake()->dateTime,
            'signed_at' => fake()->randomElement([fake()->dateTime, null]),
            'created_at' => fake()->randomElement([fake()->dateTime, null]),
            'updated_at' => fake()->randomElement([fake()->dateTime, null]),
            'deleted_at' => fake()->randomElement([fake()->dateTime, null]),
            'uploaded_by' => User::inRandomOrder()->first(),
            'dgt_procedures_id' => DgtProcedure::inRandomOrder()->first(),
            'dgt_document_requirements_id' => DgtDocumentRequirement::inRandomOrder()->first(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'uploaded_by' => null,
            'dgt_procedures_id' => null,
            'dgt_document_requirements_id' => null,
        ]);
    }
}
