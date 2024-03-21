<?php

namespace App\Models;


use App\Models\Career;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'permanent_address',
        'temporary_address',
        'contact_number',
        'expertise',
        'preferred',
        'cover_letter',
        'resume',
        'career_id',
    ];
    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}