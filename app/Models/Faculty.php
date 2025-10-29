<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'acronym',
        'dean_name',
        'phone',
        'email',
        'year_foundation',
        'logo'
    ];

    public function careers()
    {
        return $this->hasMany(Career::class, 'faculty_id');
    }
}
