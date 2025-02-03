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
        Schema::create('blog_setups', function (Blueprint $table) {
            $table->id();
            $table->string('blog_category', 255); // blog_category
            $table->string('blog_title', 255); // blog_title
            $table->string('slug', 255)->unique(); // slug, with unique constraint
            $table->text('content'); // content
            $table->string('image')->nullable(); // image (nullable, since it might not be uploaded)
            $table->string('icon_name', 255)->nullable(); // icon_name
            $table->string('author', 255)->nullable(); // author
            $table->string('seo_title', 255)->nullable(); // seo_title
            $table->string('seo_keyword', 255)->nullable(); // seo_keyword
            $table->string('seo_description', 500)->nullable(); // seo_description
            $table->integer('order')->nullable(); // order (nullable)
            $table->boolean('is_publish')->nullable(); // is_publish (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_setups');
    }
};