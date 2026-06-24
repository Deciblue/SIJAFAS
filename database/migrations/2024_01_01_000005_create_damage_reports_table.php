<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('reported_by')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['PENDING_VALIDATION', 'VALIDATED', 'REJECTED', 'CLOSED'])->default('PENDING_VALIDATION');
            $table->text('description');
            $table->timestamp('reported_at')->useCurrent();
            $table->timestamps();

            $table->index('facility_id');
            $table->index('reported_by');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('damage_reports');
    }
};
