<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educations extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'school',
        'degree',
        'field_of_study',
        'start_date',
        'end_date'
    ];
}
