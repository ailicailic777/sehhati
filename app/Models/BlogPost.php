<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'author_id', 'title_ar', 'title_en', 'title_fr',
        'content_ar', 'content_en', 'content_fr',
        'slug', 'excerpt', 'featured_image', 'is_published', 'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
