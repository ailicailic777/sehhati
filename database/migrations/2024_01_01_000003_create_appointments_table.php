<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_active')->default(true);
            $table->integer('max_patients')->default(20);
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('type', ['in_person', 'video', 'phone'])->default('in_person');
            $table->text('notes')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->primary(['patient_id', 'doctor_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('schedules');
    }
};
