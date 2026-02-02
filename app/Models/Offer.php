<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'type',
        'discount',
        'original_price',
        'discounted_price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'original_price' => 'decimal:2',
        'discounted_price' => 'decimal:2',
    ];
}
