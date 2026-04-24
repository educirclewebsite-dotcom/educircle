<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function courses()
    {
        return $this->hasMany(UniversityCourse::class);
    }

}
