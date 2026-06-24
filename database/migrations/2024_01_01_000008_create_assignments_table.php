<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')
                  ->constrained('schedules')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('technician_id')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->enum('status', [
                'IN_PROGRESS',
                'COMPLETED',
                'BLOCKED'
            ])->default('IN_PROGRESS');
            $table->timestamps();

            $table->index('schedule_id');
            $table->index('technician_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
?>
