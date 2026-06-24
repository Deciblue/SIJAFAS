<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_evidence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type', ['BEFORE', 'AFTER', 'PROGRESS']);
            $table->string('file_path');
            $table->string('description')->nullable();
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->index('assignment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_evidence');
    }
};
