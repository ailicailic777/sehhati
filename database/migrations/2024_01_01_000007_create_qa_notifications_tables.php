<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('question_ar');
            $table->string('question_en')->nullable();
            $table->string('question_fr')->nullable();
            $table->text('answer_ar')->nullable();
            $table->text('answer_en')->nullable();
            $table->text('answer_fr')->nullable();
            $table->boolean('is_answered')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('title');
            $table->text('body')->nullable();
            $table->json('data')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('question_answers');
    }
};
