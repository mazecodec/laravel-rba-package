<?php

namespace Database\Seeders;

use App\Models\DgtDocumentRequirement;
use Illuminate\Database\Seeder;

class DgtDocumentRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DgtDocumentRequirement::factory()->count(10)->create();
    }
}
