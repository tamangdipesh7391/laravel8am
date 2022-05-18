<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'gender',
        'phone',
        'email',
        'city',
        'country',
        'status'
    ];
}
