<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('extension');
            $table->string('path');
            $table->integer('size'); // in bytes
            $table->string('status');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->foreignId('uploaded_by')
                ->constrained()
                ->references('id')
                ->on('users');

            $table->foreignId('signed_by')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('users');

            $table->foreignId('dgt_process_id')
                ->constrained()
                ->references('id')
                ->on('dgt_processes');

            $table->foreignId('dgt_document_requirements_id')
                ->constrained()
                ->references('id')
                ->on('dgt_document_requirements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documents');
    }
};
