<?php

namespace Database\Seeders;

use App\Domain\Enums\ProcedureType;
use App\Domain\Enums\StatusType;
use App\Models\DgtProcess;
use Illuminate\Database\Seeder;

class DgtProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DgtProcess::factory()->create([
            'type' => ProcedureType::MATRICULACION,
        ]);

        DgtProcess::factory()->create([
            'type' => ProcedureType::TRANSFERENCIA,
        ]);

        DgtProcess::factory()->create([
            'type' => ProcedureType::BAJA,
        ]);
    }
}
