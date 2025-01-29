<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
        'icon_name',
        'description',
        'seo_title',       // SEO title
        'seo_keyword',     // SEO keyword
        'seo_description', // SEO description
        'order',
        'is_published',
    ];

    /**
     * Define the relationship with the Blog model.
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category');
    }
}
