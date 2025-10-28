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
        'name',           // Name of the career / Nombre de la carrera
        'code',           // Career code / Código de la carrera
        'faculty_id',     // Foreign key to faculty / Clave foránea a facultad
        'duration_years', // Duration in years / Duración en años
        'level',          // Level: undergraduate/postgraduate / Nivel: pregrado/postgrado
        'degree_awarded', // Degree awarded / Título otorgado
        'status'          // Status: active/inactive / Estado: activo/inactivo
    ];

    // Relationship: Career belongs to Faculty / Relación: La carrera pertenece a una facultad
    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    // Relationship: Career has many Teachers / Relación: Una carrera tiene muchos profesores
    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
}
