<?php

namespace Database\Factories;

use App\Domain\Enums\DocumentFileTypes;
use App\Models\DgtProcess;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
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
            'text' => fake()->text(255),
            'created_at' => fake()->randomElement([fake()->dateTime, null]),
            'updated_at' => fake()->randomElement([fake()->dateTime, null]),
            'deleted_at' => fake()->randomElement([fake()->dateTime, null]),
            'dgt_process_id' => $randomProcess,
        ];
    }

//    public function unverified(): static
//    {
//        return $this->state(fn(array $attributes) => [
//            'dgt_process_id' => null,
//        ]);
//    }
}
