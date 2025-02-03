<?php

namespace App\Models\admin\pages\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSetup extends Model
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
        'is_publish', // Corrected field name for publish status
    ];

    /**
     * Define the relationship with the BlogCategory model.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category'); // Ensure foreign key is correct
    }

    // Cast 'is_publish' as a boolean to handle true/false properly
    protected $casts = [
        'is_publish' => 'boolean',
    ];
}