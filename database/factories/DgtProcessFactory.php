<?php

namespace Database\Factories;

use App\Domain\Enums\ProcedureType;
use App\Domain\Enums\StatusType;
use App\Models\DgtProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DgtProcess>
 */
class DgtProcessFactory extends Factory
{
    protected $model = DgtProcess::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(ProcedureType::toArray()),
            'status' => fake()->randomElement(StatusType::toArray()),
            'status_sigadocs' => fake()->randomElement(StatusType::toArray()),
            'created_at' => fake()->randomElement([fake()->dateTime, null]),
            'updated_at' => fake()->randomElement([fake()->dateTime, null]),
            'deleted_at' => fake()->randomElement([fake()->dateTime, null])
        ];
    }
}
