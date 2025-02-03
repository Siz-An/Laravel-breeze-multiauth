<?php

namespace App\Models\admin\pages\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'icon_name',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'order',
        'is_published', // Corrected field name for publish status
    ];

    /**
     * Define the relationship with the Blog model.
     */
    public function blogs()
    {
        return $this->hasMany(BlogSetup::class, 'blog_category');
    }

    // Cast 'is_published' as a boolean to handle true/false properly
    protected $casts = [
        'is_published' => 'boolean',
    ];
}