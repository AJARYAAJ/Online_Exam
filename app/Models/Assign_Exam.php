<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_Exam extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'exam_id',];
}
