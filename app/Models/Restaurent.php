<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    use HasFactory;
    protected $fillable = [
        'rest_name',
        'rest_image',
        'rest_description',
        'rest_address',
        'opening_time',
        'closing_time',
        'phone_number',
        'email',
        'fb_link',
        'page_title',
        'meta_keywords',
        'meta_description',
        'created_by',
        'updated_by',
        'route_url',
        'delivery_status',
        'status',
        
     
    ];
}
