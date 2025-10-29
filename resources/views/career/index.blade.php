@extends('layout.app')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Carreras</h1>
    <a href="{{ route('career.create') }}" class="btn btn-outline-primary">
        <i class="fa fa-plus"></i> Nueva Carrera
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table id="careerTable" class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Facultad</th>
                <th>Duración (años)</th>
                <th>Nivel</th>
                <th>Título Otorgado</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($careers as $career)
                <tr>
                    <td>{{ $career->name }}</td>
                    <td>{{ $career->code }}</td>
                    <td>{{ $career->faculty->name ?? 'Sin facultad' }}</td>
                    <td>{{ $career->duration_years }}</td>
                    <td>{{ ucfirst($career->level) }}</td>
                    <td>{{ $career->degree_awarded }}</td>
                    <td>
                        <span class="badge {{ $career->status == 'activo' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($career->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('career.edit', $career->id) }}" class="btn btn-outline-warning btn-sm mb-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('career.destroy', $career->id) }}" method="POST" class="d-inline" id="eliminar-form-{{ $career->id }}">
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

    document.querySelectorAll('form[id^="eliminar-form-"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
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

    new DataTable('#careerTable', {
        paging: true,
        responsive: true,
        layout: {
            topStart: { buttons: ['copy', 'csv', 'excel', 'pdf', 'print'] }
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
        },
    });

});
</script>
@endpush

@endsection
