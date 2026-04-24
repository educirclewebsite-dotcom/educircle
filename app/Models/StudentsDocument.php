<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsDocument extends Model
{
    use HasFactory;

     protected $fillable = [
        'student_id',
        'document_name',
        'document_path',
    ];

}
