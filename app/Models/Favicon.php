<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favicon extends Model
{
    use HasFactory;
    protected $fillable = [
        'favicon_thirtyTwo',
        'favicon_sixteen',
        'favicon_ico',
        'apple_touch_icon',
        'file',
    ];
}
