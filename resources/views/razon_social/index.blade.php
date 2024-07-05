@extends('adminlte::page')

@section('title', 'Listado de Razones Sociales')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Razones Sociales</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Razones Sociales</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Razones Sociales</h3>
                        <div class="card-tools">
                            <a href="{{ route('razon_social.create') }}" class="btn btn-primary">Crear Nuevo</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="razon-social-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Tipo Persona</th>
                                    <th>Nro Identificación</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($razonSocials as $razonSocial)
                                <tr>
                                    <td>{{ $razonSocial->id_RS }}</td>
                                    <td>{{ $razonSocial->nombreCompleto }}</td>
                                    <td>{{ $razonSocial->tipoPersonaClasificacion->titulo ?? 'N/A' }}</td>
                                    <td>{{ $razonSocial->nroIdentificacion }}</td>
                                    <td>{{ $razonSocial->telefono }}</td>
                                    <td>{{ $razonSocial->email }}</td>
                                    <td>{{ $razonSocial->direccion }}</td>
                                    <td>{{ $razonSocial->rolClasificacion->titulo ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('razon_social.show', $razonSocial->id_RS) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('razon_social.edit', $razonSocial->id_RS) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('razon_social.destroy', $razonSocial->id_RS) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('adminlte_scripts')
<script>
    $(document).ready(function() {
        $('#razon-social-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }
        });
    });
</script>
@stop

@endsection
