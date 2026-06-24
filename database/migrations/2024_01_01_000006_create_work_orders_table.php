<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damage_report_id')
                  ->constrained('damage_reports')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->enum('status', ['OPEN', 'IN_PROGRESS', 'COMPLETED', 'CANCELLED'])->default('OPEN');
            $table->text('notes')->nullable();
            $table->timestamp('issued_at')->useCurrent();
            $table->timestamps();

            $table->index('damage_report_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
