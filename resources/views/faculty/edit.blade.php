@extends('layout.app')

@section('contenido')
<form action="{{ route('faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data" id="formEditFaculty"
      style="max-width: 700px; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    @method('PUT')
    <h1 class="text-center mb-4">Editar Facultad</h1>

    <div class="mb-3">
        <label for="name_fac" class="form-label fw-bold">Nombre:</label>
        <input type="text" name="name_fac" id="name_fac" class="form-control" value="{{ $faculty->name }}" required>
    </div>

    <div class="mb-3">
        <label for="acronym_fac" class="form-label fw-bold">Acrónimo:</label>
        <input type="text" name="acronym_fac" id="acronym_fac" class="form-control" value="{{ $faculty->acronym }}" required>
    </div>

    <div class="mb-3">
        <label for="dean_name_fac" class="form-label fw-bold">Decano:</label>
        <input type="text" name="dean_name_fac" id="dean_name_fac" class="form-control" value="{{ $faculty->dean_name }}" required>
    </div>

    <div class="mb-3">
        <label for="phone_fac" class="form-label fw-bold">Teléfono:</label>
        <input type="text" name="phone_fac" id="phone_fac" class="form-control" value="{{ $faculty->phone }}" required>
    </div>

    <div class="mb-3">
        <label for="email_fac" class="form-label fw-bold">Email:</label>
        <input type="email" name="email_fac" id="email_fac" class="form-control" value="{{ $faculty->email }}" required>
    </div>

    <div class="mb-3">
        <label for="logo_fac" class="form-label fw-bold">Logo:</label><br>
        @if($faculty->logo)
            <img src="{{ asset($faculty->logo) }}" width="120" class="img-thumbnail mb-2" alt="Logo actual">
        @endif
        <input type="file" name="logo_fac" id="logo_fac" class="form-control">
    </div>

    <div class="mb-3">
        <label for="year_foundation_fac" class="form-label fw-bold">Año de Fundación:</label>
        <input type="number" name="year_foundation_fac" id="year_foundation_fac" class="form-control" value="{{ $faculty->year_foundation }}" required>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success me-2">Actualizar</button>
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

    $("#formEditFaculty").validate({
        rules: {
            "name_fac": { required: true, minlength: 3 },
            "acronym_fac": { required: true },
            "dean_name_fac": { required: true, minlength: 3 },
            "phone_fac": { required: true },
            "email_fac": { required: true, email: true },
            "year_foundation_fac": { required: true, digits: true }
        },
        messages: {
            "name_fac": { required: "Por favor ingresa el nombre.", minlength: "Mínimo 3 caracteres." },
            "acronym_fac": { required: "Por favor ingresa el acrónimo." },
            "dean_name_fac": { required: "Por favor ingresa el decano." },
            "phone_fac": { required: "Por favor ingresa el teléfono." },
            "email_fac": { required: "Por favor ingresa el email.", email: "Email no válido." },
            "year_foundation_fac": { required: "Por favor ingresa el año.", digits: "Sólo números." }
        }
    });
});
</script>
@endpush
@endsection