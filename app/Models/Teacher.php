<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'specialization',
        'degree',
        'photo',
        'career_id'
    ];

    // Relationship: Teacher belongs to Career
    public function career() {
        return $this->belongsTo(Career::class);
    }

    // Accessor for full name
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}