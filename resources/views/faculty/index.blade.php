@extends('layout.app')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Listado de Facultades</h1>
    <a href="{{ route('faculty.create') }}" class="btn btn-outline-primary">
        <i class="fa fa-plus"></i> Nueva Facultad
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table id="facultyTable" class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Acrónimo</th>
                <th>Decano</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Año Fundación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faculty as $item)
                <tr>
                    <td>{{ $item->name_fac }}</td>
                    <td>{{ $item->acronym_fac }}</td>
                    <td>{{ $item->dean_name_fac }}</td>
                    <td>{{ $item->phone_fac }}</td>
                    <td>{{ $item->email_fac }}</td>
                    <td class="text-center">
                        @if($item->logo_fac)
                            <img src="{{ asset($item->logo_fac) }}" width="60" class="img-thumbnail" alt="Logo {{ $item->name_fac }}">
                        @else
                            <span class="text-muted">Sin logo</span>
                        @endif
                    </td>
                    <td>{{ $item->year_foundation_fac }}</td>
                    <td class="text-center">
                        <a href="{{ route('faculty.edit', $item->id_fac) }}" class="btn btn-outline-warning btn-sm mb-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('faculty.destroy', $item->id_fac) }}" method="POST" class="d-inline" id="eliminar-form-{{ $item->id_fac }}">
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

    // DataTable (si usas la versión que llamas con new DataTable)
    let table = new DataTable('#facultyTable', {
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
