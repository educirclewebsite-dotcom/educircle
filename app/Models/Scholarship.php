<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'eligibility',
        'amount',
        'university_id',
        'country_id',
        'course_id',
        'level',
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function universityCourse()
    {
        return $this->belongsTo(UniversityCourse::class, 'university_id');
    }

    public function courseInfo()
    {
        return $this->belongsTo(UniversityCourse::class, 'course_id');
    }

    public function courseDetail()
    {
        return $this->belongsTo(UniversityCourse::class, 'course_id');
    }


    
}
