@extends('layout.app')

@section('contenido')
<form action="{{ route('faculty.store') }}" method="POST" enctype="multipart/form-data" id="formNuevoFaculty"
      style="max-width: 700px; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    <h1 class="text-center mb-4">Registrar Nueva Facultad</h1>

    <div class="mb-3">
        <label for="name_fac" class="form-label fw-bold">Nombre:</label>
        <input type="text" name="name_fac" id="name_fac" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="acronym_fac" class="form-label fw-bold">Acrónimo:</label>
        <input type="text" name="acronym_fac" id="acronym_fac" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="dean_name_fac" class="form-label fw-bold">Decano:</label>
        <input type="text" name="dean_name_fac" id="dean_name_fac" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone_fac" class="form-label fw-bold">Teléfono:</label>
        <input type="text" name="phone_fac" id="phone_fac" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email_fac" class="form-label fw-bold">Email:</label>
        <input type="email" name="email_fac" id="email_fac" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="logo_fac" class="form-label fw-bold">Logo:</label>
        <input type="file" name="logo_fac" id="logo_fac" class="form-control">
    </div>

    <div class="mb-3">
        <label for="year_foundation_fac" class="form-label fw-bold">Año de Fundación:</label>
        <input type="number" name="year_foundation_fac" id="year_foundation_fac" class="form-control" required>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success me-2">Guardar</button>
        <a href="{{ route('faculty.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@push('scripts')
<script>
$(document).ready(function() {
    $("#logo_fac").fileinput({
        language: "es",
        allowedFileExtensions: ["png", "jpg", "jpeg"],
        showCaption: false,
        dropZoneEnabled: true,
        showClose: false,
        theme: "fas"
    });

    $("#formNuevoFaculty").validate({
        rules: {
            "name_fac": { required: true, minlength: 3 },
            "acronym_fac": { required: true },
            "dean_name_fac": { required: true, minlength: 3 },
            "phone_fac": { required: true },
            "email_fac": { required: true, email: true },
            "year_foundation_fac": { required: true, digits: true, min: 2000, max:2020 }
        },
        messages: {
            "name_fac": { required: "Por favor ingresa el nombre.", minlength: "Mínimo 3 caracteres." },
            "acronym_fac": { required: "Por favor ingresa el acrónimo." },
            "dean_name_fac": { required: "Por favor ingresa el decano." },
            "phone_fac": { required: "Por favor ingresa el teléfono." },
            "email_fac": { required: "Por favor ingresa el email.", email: "Email no válido." },
            "year_foundation_fac": { required: "Por favor ingresa el año.", digits: "Sólo números.", min: "El año debe ser ≥ 2000", 
            max: "El año debe ser ≤ 2020" }
        }
    });
});
</script>
@endpush
@endsection