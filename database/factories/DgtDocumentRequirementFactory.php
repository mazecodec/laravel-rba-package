<?php

namespace Database\Factories;

use App\Domain\Enums\DocumentFileTypes;
use App\Models\DgtDocumentRequirement;
use App\Models\DgtProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DgtDocumentRequirement>
 */
class DgtDocumentRequirementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomProcess = DgtProcess::inRandomOrder()->first();

        return [
            'code' => fake()->randomElement(DocumentFileTypes::toArray()),
            'file_extension' => fake()->fileExtension(),
            'file_max_size' => 1000000, // in bytes
            'is_additional' => fake()->randomElement([true, false]),
            'created_at' => fake()->randomElement([fake()->dateTime, null]),
            'updated_at' => fake()->randomElement([fake()->dateTime, null]),
            'deleted_at' => fake()->randomElement([fake()->dateTime, null]),
            'dgt_process_id' => $randomProcess,
        ];
    }
}
