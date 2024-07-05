@extends('adminlte::page')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalles de la Razón Social</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('razon_social.index') }}">Razones Sociales</a></li>
                    <li class="breadcrumb-item active">Detalles</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Razón Social: {{ $razonSocial->nombreCompleto }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre Completo:</strong> {{ $razonSocial->nombreCompleto }}</p>
                        <p><strong>Tipo de Persona:</strong> {{ $razonSocial->tipoPersonaClasificacion->titulo ?? 'N/A' }}</p>
                        <p><strong>Número de Identificación:</strong> {{ $razonSocial->nroIdentificacion }}</p>
                        <p><strong>Teléfono:</strong> {{ $razonSocial->telefono }}</p>
                        <p><strong>Email:</strong> {{ $razonSocial->email }}</p>
                        <p><strong>Dirección:</strong> {{ $razonSocial->direccion }}</p>
                        <p><strong>Rol:</strong> {{ $razonSocial->rolClasificacion->titulo ?? 'N/A' }}</p>
                        <p><strong>Contraseña:</strong> {{ $razonSocial->contraseña }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('razon_social.index') }}" class="btn btn-secondary">Volver a la lista</a>
                        <a href="{{ route('razon_social.edit', $razonSocial->id_RS) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('razon_social.destroy', $razonSocial->id_RS) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta razón social?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
