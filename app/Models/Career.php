<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',           
        'code',           
        'faculty_id',     
        'duration_years', 
        'level',          
        'degree_awarded', 
        'status'          
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
}
