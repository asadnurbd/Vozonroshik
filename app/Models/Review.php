<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'r_id',
        'user_name',
        'user_image',
        'service',
        'ambiance',
        'value', 
        'Interior',
        'comments',
        'total_rating',
        'likes',
        'dislikes',
        'review_content',
        'images',
    ];
    protected $casts = [
        'likes' => 'array',
        'dislikes' => 'array',
        'comments' => 'array',
        'images' => 'array',
        'total_rating' => 'array',
    ];
 
}
