<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wilayas', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2)->unique();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->timestamps();
        });

        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wilaya_id')->constrained()->onDelete('cascade');
            $table->string('code', 5)->unique();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('communes');
        Schema::dropIfExists('wilayas');
    }
};
