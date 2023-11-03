<?php

use App\Domain\Enums\ProcedureType;
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
            $table->enum('type', ProcedureType::toArray());
            $table->enum('status', StatusType::toArray())->default(StatusType::REV->stringValue());
            $table->enum('status_sigadocs', StatusType::toArray())->default(StatusType::REV->stringValue());
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
