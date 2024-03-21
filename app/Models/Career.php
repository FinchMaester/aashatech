<?php

namespace App\Models;


use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'deadline',
    ];
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

}