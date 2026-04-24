<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_type',
        'study_area',
    ];

    protected $casts = [
        'study_area' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
