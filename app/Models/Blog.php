<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'tags',
        'main_image',
        'status',
        'sections',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'tags' => 'array',
        'sections' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
