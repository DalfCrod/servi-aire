@extends('adminlte::page')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Razón Social</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('razon_social.index') }}">Razones Sociales</a></li>
                    <li class="breadcrumb-item active">Editar</li>
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
                        <h3 class="card-title">Actualizar Datos de la Razón Social</h3>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('razon_social.update', $razonSocial->id_RS) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombreCompleto">Nombre Completo</label>
                                <input type="text" name="nombreCompleto" class="form-control" value="{{ old('nombreCompleto', $razonSocial->nombreCompleto) }}">
                            </div>
                            <div class="form-group">
                                <label for="tipoPersona">Tipo de Persona</label>
                                <select name="tipoPersona" class="form-control">
                                    @foreach($tipoPersonas as $id => $nombre)
                                    <option value="{{ $id }}" {{ $razonSocial->tipoPersona == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nroIdentificacion">Número de Identificación</label>
                                <input type="text" name="nroIdentificacion" class="form-control" value="{{ old('nroIdentificacion', $razonSocial->nroIdentificacion) }}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $razonSocial->telefono) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $razonSocial->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $razonSocial->direccion) }}">
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select name="rol" class="form-control">
                                    @foreach($roles as $id => $nombre)
                                    <option value="{{ $id }}" {{ $razonSocial->rol == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" name="contraseña" class="form-control" value="{{ old('contraseña', $razonSocial->contraseña) }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('razon_social.index') }}" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
