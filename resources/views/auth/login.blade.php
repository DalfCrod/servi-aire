@extends('adminlte::page')

@section('title', 'Login')

@section('content_header')
<h1>Login</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Login</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nroIdentificacion">Número de Identificación:</label>
                <input type="text" class="form-control" id="nroIdentificacion" name="nroIdentificacion" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
@stop
