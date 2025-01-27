<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category',
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
}
