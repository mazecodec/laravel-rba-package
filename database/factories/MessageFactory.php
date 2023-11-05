<?php

namespace Database\Factories;

use App\Domain\Entities\DocumentFile;
use App\Domain\Enums\DocumentFileTypes;
use App\Domain\Enums\ProcedureType;
use App\Models\DgtProcedure;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = fake()->unique()->randomElement(DocumentFileTypes::toArray());

        $processDgt = DgtProcedure::inRandomOrder()->first();

        $message = new \App\Domain\Entities\Message(
            $code,
            fake()->text(50),
            DocumentFileTypes::tryFrom(fake()->randomElement(DocumentFileTypes::toArray())),
            $processDgt->type
        );

        return [
            'code' => $code,
            'text' => $message->description(),
            'created_at' => fake()->randomElement([fake()->dateTime, null]),
            'updated_at' => fake()->randomElement([fake()->dateTime, null]),
            'deleted_at' => fake()->randomElement([fake()->dateTime, null]),
            'dgt_process_id' => $processDgt,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'dgt_process_id' => null,
        ]);
    }
}
