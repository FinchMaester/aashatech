<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'img_desc', 'img'];


    protected $casts = [
        'img' => 'array'
    ];
}