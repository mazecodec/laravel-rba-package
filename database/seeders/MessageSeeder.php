<?php

namespace Database\Seeders;

use App\Domain\Enums\DocumentFileTypes;
use App\Models\DgtProcess;
use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()->create([
            'dgt_process_id' => DgtProcess::inRandomOrder()->first(),
        ]);

        // NOTE: 41 messages aprox in lang files
        Message::factory()->count(41)->create();
    }
}
