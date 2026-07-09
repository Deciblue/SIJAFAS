<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('work_orders', function (Blueprint $table) {


            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Source Report
            |--------------------------------------------------------------------------
            */


            $table->foreignId('damage_report_id')
                  ->constrained('damage_reports')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Technician Assignment
            |--------------------------------------------------------------------------
            */


            $table->foreignId('technician_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Work Order Information
            |--------------------------------------------------------------------------
            */


            $table->string('title');


            $table->text('description')
                  ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Work Order Status
            |--------------------------------------------------------------------------
            */


            $table->enum(
                'status',
                [
                    'OPEN',
                    'IN_PROGRESS',
                    'COMPLETED',
                    'CANCELLED'
                ]
            )
            ->default('OPEN');



            /*
            |--------------------------------------------------------------------------
            | Additional Notes
            |--------------------------------------------------------------------------
            */


            $table->text('notes')
                  ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Timeline
            |--------------------------------------------------------------------------
            */


            $table->timestamp('issued_at')
                  ->useCurrent();



            $table->timestamp('completed_at')
                  ->nullable();



            $table->timestamps();



            /*
            |--------------------------------------------------------------------------
            | Index
            |--------------------------------------------------------------------------
            */


            $table->index('damage_report_id');

            $table->index('technician_id');

            $table->index('status');


        });

    }



    public function down(): void
    {

        Schema::dropIfExists('work_orders');

    }

};