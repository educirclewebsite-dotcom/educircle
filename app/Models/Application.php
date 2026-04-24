<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
   protected $fillable = ['user_id', 'university_course_id'];



public function universityCourse()
{
    return $this->belongsTo(UniversityCourse::class, 'university_course_id');
}



public function university()
{
    return $this->universityCourse->university();
}

public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

}
