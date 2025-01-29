<?php

// app/Models/Blog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category',  // Foreign key to BlogCategory
        'blog_title',
        'slug',
        'content',
        'image',
        'icon_name',
        'author',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'order',
        'is_publish',
    ];

    /**
     * Define the relationship with the BlogCategory model.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category'); // Change the second parameter if needed
    }
}

