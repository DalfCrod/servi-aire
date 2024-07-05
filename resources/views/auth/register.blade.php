@extends('adminlte::page')

@section('title', 'Register')

@section('content_header')
<h1>Registro</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombreCompleto">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
            </div>
            <div class="form-group">
                <label for="tipoPersona">Tipo de Persona:</label>
                <select class="form-control" id="tipoPersona" name="tipoPersona" required>
                    @foreach ($tipoPersonas as $id => $nombre)
                    <option value="{{ $id }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nroIdentificacion">Número de Identificación:</label>
                <input type="text" class="form-control" id="nroIdentificacion" name="nroIdentificacion" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol" required>
                    @foreach ($roles as $id => $nombre)
                    <option value="{{ $id }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <div class="form-group">
                <label for="contraseña_confirmation">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="contraseña_confirmation" name="contraseña_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</div>
@stop
