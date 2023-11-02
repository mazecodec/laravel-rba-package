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
            $table->string('status');
            $table->timestamp('uploaded_at');
            $table->timestamp('downloaded_at');
            $table->string('uploaded_by');
            $table->string('downloaded_by');
            $table->timestamp('signed_at');
            $table->timestamps();

            $table->foreignId('users_id')
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
