<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('damage_reports', function (Blueprint $table) {

        $table->id();


        // pelapor
        $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();


        // data fasilitas
        $table->string('facility_name');

        $table->string('location');


        // laporan
        $table->string('title');

        $table->text('description');


        // tingkat kerusakan
        $table->enum('severity', [
            'low',
            'medium',
            'high'
        ]);



        // status laporan

        $table->enum('status', [

            'submitted',
            'validated',
            'rejected',
            'completed'

        ])->default('submitted');


        $table->timestamps();

    });
}
};
