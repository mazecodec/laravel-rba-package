<?php

namespace Database\Seeders;

use App\Domain\Enums\ProcedureType;
use App\Domain\Enums\StatusType;
use App\Models\DgtProcedure;
use Illuminate\Database\Seeder;

class DgtProceduresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DgtProcedure::factory()->create([
            'type' => ProcedureType::MATRICULACION,
        ]);

        DgtProcedure::factory()->create([
            'type' => ProcedureType::TRANSFERENCIA,
        ]);

        DgtProcedure::factory()->create([
            'type' => ProcedureType::BAJA,
        ]);
    }
}
