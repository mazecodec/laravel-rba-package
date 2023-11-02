<?php

use App\Domain\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dgt_processes', function (Blueprint $table) {
            $table->id();
            $table->enum('status', StatusType::getArrayValues())->default(StatusType::REV->stringValue());
            $table->enum('status_sigadocs', StatusType::getArrayValues())->default(StatusType::REV->stringValue());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dgt_processes');
    }
};
