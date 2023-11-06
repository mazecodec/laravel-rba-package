<?php

namespace Database\Seeders;

use App\Domain\Enums\DocumentFileTypes;
use App\Models\DgtProcedure;
use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()->count(41)->create();
    }
}
