<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['NOT_STARTED', 'IN_PROGRESS', 'PAUSED', 'COMPLETED'])->default('NOT_STARTED');
            $table->unsignedTinyInteger('progress_percentage')->default(0);
            $table->text('notes')->nullable();
            $table->foreignId('updated_by')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->index('assignment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_progress');
    }
};
