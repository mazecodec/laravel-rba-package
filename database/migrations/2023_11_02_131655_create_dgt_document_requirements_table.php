<?php

use App\Domain\Enums\DocumentFileTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dgt_document_requirements', function (Blueprint $table) {
            $table->id();
            $table->enum('code', DocumentFileTypes::getArrayValues());
            $table->string('file_extension',10);
            $table->integer('file_max_size'); // in bytes
            $table->boolean('is_additional')->default(false);
            $table->timestamps();

            $table->foreignId('dgt_process')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dgt_document_requirements');
    }
};