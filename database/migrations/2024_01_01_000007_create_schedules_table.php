<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_order_id')
                  ->constrained('work_orders')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->enum('status', ['PENDING', 'HEAD_APPROVAL', 'APPROVED', 'REJECTED'])->default('PENDING');
            $table->dateTime('scheduled_start');
            $table->dateTime('scheduled_end');
            $table->timestamps();

            $table->index('work_order_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
