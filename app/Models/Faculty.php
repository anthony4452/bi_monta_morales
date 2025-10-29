<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'acronym', 
        'dean_name',
        'phone',
        'email',
        'logo',
        'year_foundation'
    ];
}