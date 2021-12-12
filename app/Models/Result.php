<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'exam_id', 'exam_name', 'question', 'option_a', 'option_b', 'option_c',
     'option_d', 'user_input', 'answer'];
}
