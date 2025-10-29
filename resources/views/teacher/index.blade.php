@extends('layout.app')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Profesores</h1>
    <a href="{{ route('teacher.create') }}" class="btn btn-outline-primary">
        <i class="fa fa-plus"></i> Nuevo Profesor
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table id="teacherTable" class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Especialización</th>
                <th>Título Académico</th>
                <th>Carrera</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->specialization }}</td>
                    <td>{{ $teacher->degree }}</td>
                    <td>{{ $teacher->career->name ?? 'Sin carrera' }}</td>
                    <td class="text-center">
                        @if($teacher->photo)
                            <img src="{{ asset($teacher->photo) }}" width="60" class="img-thumbnail rounded-circle" alt="Foto {{ $teacher->first_name }}">
                        @else
                            <span class="text-muted">Sin foto</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-outline-warning btn-sm mb-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-inline" id="eliminar-form-{{ $teacher->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // SweetAlert confirm delete
    document.querySelectorAll('form[id^="eliminar-form-"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });
    });

    // DataTable
    let table = new DataTable('#teacherTable', {
        paging: true,
        responsive: true,
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
        },
    });

});
</script>
@endpush

@endsection