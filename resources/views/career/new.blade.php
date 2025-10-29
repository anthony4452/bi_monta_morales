@extends('layout.app')

@section('contenido')
<form action="{{ route('career.store') }}" method="POST" id="formNuevaCareer"
      style="max-width: 700px; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    <h1 class="text-center mb-4">Registrar Nueva Carrera</h1>

    <div class="mb-3">
        <label for="name_career" class="form-label fw-bold">Nombre:</label>
        <input type="text" name="name_career" id="name_career" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="code_career" class="form-label fw-bold">Código:</label>
        <input type="text" name="code_career" id="code_career" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="faculty_id_career" class="form-label fw-bold">Facultad:</label>
        <select name="faculty_id_career" id="faculty_id_career" class="form-select" required>
            <option value="">Seleccione una facultad</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="duration_years_career" class="form-label fw-bold">Duración (años):</label>
            <input type="number" name="duration_years_career" id="duration_years_career" class="form-control" min="1" max="10" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="level_career" class="form-label fw-bold">Nivel:</label>
            <select name="level_career" id="level_career" class="form-select" required>
                <option value="">Seleccione nivel</option>
                <option value="pregrado">Pregrado</option>
                <option value="postgrado">Postgrado</option>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="degree_awarded_career" class="form-label fw-bold">Título Otorgado:</label>
        <input type="text" name="degree_awarded_career" id="degree_awarded_career" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status_career" class="form-label fw-bold">Estado:</label>
        <select name="status_career" id="status_career" class="form-select" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success me-2">Guardar</button>
        <a href="{{ route('career.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@push('scripts')
<script>
$(document).ready(function() {
    $("#formNuevaCareer").validate({
        rules: {
            "name_career": { required: true, minlength: 3 },
            "code_career": { required: true },
            "faculty_id_career": { required: true },
            "duration_years_career": { required: true, number: true, min: 1, max: 10 },
            "level_career": { required: true },
            "degree_awarded_career": { required: true, minlength: 3 },
            "status_career": { required: true }
        },
        messages: {
            "name_career": { required: "Ingresa el nombre de la carrera.", minlength: "Mínimo 3 caracteres." },
            "code_career": { required: "Ingresa el código de la carrera." },
            "faculty_id_career": { required: "Selecciona una facultad." },
            "duration_years_career": { required: "Ingresa la duración.", number: "Debe ser un número.", min: "Mínimo 1 año.", max: "Máximo 10 años." },
            "level_career": { required: "Selecciona el nivel académico." },
            "degree_awarded_career": { required: "Ingresa el título otorgado.", minlength: "Mínimo 3 caracteres." },
            "status_career": { required: "Selecciona el estado." }
        }
    });
});
</script>
@endpush
@endsection
