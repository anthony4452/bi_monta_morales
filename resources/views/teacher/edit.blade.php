@extends('layout.app')

@section('contenido')

<form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" id="formEditTeacher"
      style="max-width: 700px; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    @csrf
    @method('PUT')

    <h1 class="text-center mb-4">Editar Profesor</h1>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="first_name_teacher" class="form-label fw-bold">Nombre:</label>
            <input type="text" name="first_name_teacher" id="first_name_teacher" class="form-control"
                   value="{{ old('first_name_teacher', $teacher->first_name) }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="last_name_teacher" class="form-label fw-bold">Apellido:</label>
            <input type="text" name="last_name_teacher" id="last_name_teacher" class="form-control"
                   value="{{ old('last_name_teacher', $teacher->last_name) }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email_teacher" class="form-label fw-bold">Email:</label>
            <input type="email" name="email_teacher" id="email_teacher" class="form-control"
                   value="{{ old('email_teacher', $teacher->email) }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="phone_teacher" class="form-label fw-bold">Teléfono:</label>
            <input type="text" name="phone_teacher" id="phone_teacher" class="form-control"
                   value="{{ old('phone_teacher', $teacher->phone) }}" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="specialization_teacher" class="form-label fw-bold">Especialización:</label>
        <input type="text" name="specialization_teacher" id="specialization_teacher" class="form-control"
               value="{{ old('specialization_teacher', $teacher->specialization) }}" required>
    </div>

    <div class="mb-3">
        <label for="degree_teacher" class="form-label fw-bold">Título Académico:</label>
        <input type="text" name="degree_teacher" id="degree_teacher" class="form-control"
               value="{{ old('degree_teacher', $teacher->degree) }}" required>
    </div>

    <div class="mb-3">
        <label for="career_id_teacher" class="form-label fw-bold">Carrera:</label>
        <select name="career_id_teacher" id="career_id_teacher" class="form-select" required>
            <option value="">Seleccione una carrera</option>
            @foreach($careers as $career)
                <option value="{{ $career->id }}"
                    {{ old('career_id_teacher', $teacher->career_id) == $career->id ? 'selected' : '' }}>
                    {{ $career->name }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success me-2">Actualizar</button>
        <a href="{{ route('teacher.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@push('scripts')
<script>
$(document).ready(function() {
    // FileInput
    $("#photo_teacher").fileinput({
        language: "es",
        allowedFileExtensions: ["png", "jpg", "jpeg"],
        showCaption: false,
        dropZoneEnabled: true,
        showClose: false,
        theme: "fas"
    });

    // jQuery Validate
    $("#formEditTeacher").validate({
        rules: {
            "first_name_teacher": { required: true, minlength: 2 },
            "last_name_teacher": { required: true, minlength: 2 },
            "email_teacher": { required: true, email: true },
            "phone_teacher": { required: true },
            "specialization_teacher": { required: true, minlength: 3 },
            "degree_teacher": { required: true, minlength: 3 },
            "career_id_teacher": { required: true }
        },
        messages: {
            "first_name_teacher": { required: "Por favor ingresa el nombre.", minlength: "Mínimo 2 caracteres." },
            "last_name_teacher": { required: "Por favor ingresa el apellido.", minlength: "Mínimo 2 caracteres." },
            "email_teacher": { required: "Por favor ingresa el email.", email: "Email no válido." },
            "phone_teacher": { required: "Por favor ingresa el teléfono." },
            "specialization_teacher": { required: "Por favor ingresa la especialización.", minlength: "Mínimo 3 caracteres." },
            "degree_teacher": { required: "Por favor ingresa el título académico.", minlength: "Mínimo 3 caracteres." },
            "career_id_teacher": { required: "Por favor selecciona una carrera." }
        }
    });
});
</script>
@endpush

@endsection
