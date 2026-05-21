<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('wilaya')->nullable();
            $table->string('commune')->nullable();
            $table->string('address')->nullable();
            $table->string('blood_type')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('specialty_id')->constrained()->onDelete('cascade');
            $table->string('license_number')->unique();
            $table->string('wilaya')->nullable();
            $table->string('commune')->nullable();
            $table->string('address')->nullable();
            $table->decimal('consultation_fee', 8, 2)->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->boolean('is_verified')->default(false);
            $table->text('bio')->nullable();
            $table->text('education')->nullable();
            $table->integer('experience_years')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('specialties');
    }
};
