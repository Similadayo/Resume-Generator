<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;

    protected $tables = 'resume';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'summary',
    ];
}
