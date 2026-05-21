<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->text('content_ar');
            $table->text('content_en')->nullable();
            $table->text('content_fr')->nullable();
            $table->string('slug')->unique();
            $table->string('excerpt')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blog_posts');
    }
};
