<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

  
public function user()
{
    return $this->belongsTo(User::class);
}



public function passport()
{
    return $this->hasOne(Passport::class);
}

public function documents()
{
    return $this->hasMany(StudentsDocument::class);
}

public function studentPayments()
{
    return $this->hasMany(StudentPayment::class);
}

public function countryName() {
    return $this->belongsTo(Countries::class, 'country');
}
public function course()
{
    return $this->hasOne(Course::class, 'course_name', 'course_preference');
}
protected $fillable = [
    'user_id',
    'name',
    'last_name',
    'father_name',
    'gender',
    'marital_status',
    'city',
    'address',
    'pin_code',
    'country',
    'state',
    'course_type',
    'course_preference',
    'offer_price',
    'final_price',
    'status',
];



}

