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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('icon_name')->nullable();
            $table->text('description')->nullable();
            $table->string('seo_title')->nullable(); // SEO title (optional)
            $table->string('seo_keyword')->nullable(); // SEO keyword (optional)
            $table->text('seo_description')->nullable(); // SEO description (optional)
            $table->integer('order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
