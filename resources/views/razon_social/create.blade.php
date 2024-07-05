@extends('adminlte::page')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Razón Social</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('razon_social.index') }}">Razones Sociales</a></li>
                    <li class="breadcrumb-item active">Crear</li>
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
                        <h3 class="card-title">Datos de la Razón Social</h3>
                    </div>
                    <form action="{{ route('razon_social.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombreCompleto">Nombre Completo</label>
                                <input type="text" name="nombreCompleto" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tipoPersona">Tipo Persona</label>
                                <select name="tipoPersona" class="form-control" required>
                                    @foreach($tipoPersonas as $id => $titulo)
                                    <option value="{{ $id }}">{{ $titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nroIdentificacion">Nro Identificación</label>
                                <input type="number" name="nroIdentificacion" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select name="rol" class="form-control" required>
                                    @foreach($roles as $id => $titulo)
                                    <option value="{{ $id }}">{{ $titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña</label>
                                <input type="text" name="contraseña" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('razon_social.index') }}" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')

@stop
