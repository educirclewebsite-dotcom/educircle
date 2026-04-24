<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'university_id',
        'duration_months',
        'course_fee',
        'semester',
        'scholarship',
        'is_popular',
        'is_top_course',
    ];
    //     public function university()
// {
//     return $this->belongsTo(University::class);
// }
// public function course()
// {
//     return $this->belongsTo(\App\Models\Course::class, 'course_id');
// }
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
}
