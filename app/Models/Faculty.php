<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    protected $primaryKey = 'id_fac';
    public $timestamps = false;

    protected $fillable = [
        'name_fac',
        'acronym_fac',
        'dean_name_fac',
        'phone_fac',
        'email_fac',
        'logo_fac',
        'year_foundation_fac'
    ];
}
