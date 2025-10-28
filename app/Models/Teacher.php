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
        'first_name',    // First name / Nombre
        'last_name',     // Last name / Apellido
        'email',         // Email / Correo electrónico
        'phone',         // Phone / Teléfono
        'specialization',// Specialization / Especialidad
        'degree',        // Academic degree / Título académico
        'career_id'      // Foreign key to Career / Clave foránea a carrera
    ];

    // Relationship: Teacher belongs to Career / Relación: El profesor pertenece a una carrera
    public function career() {
        return $this->belongsTo(Career::class);
    }
}
