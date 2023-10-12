<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    # Defines the fillable column
    # Column like 'id' can't be filled
    protected $fillable = ['name', 'email', 'age', 'gpa', 'photo'];
}