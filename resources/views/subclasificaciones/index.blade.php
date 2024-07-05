@extends('adminlte::page')

@section('title', 'SubClasificaciones de ' . $clasificacion->titulo)

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SubClasificaciones de {{ $clasificacion->titulo }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('clasificaciones.index') }}">Clasificaciones</a></li>
                    <li class="breadcrumb-item active">SubClasificaciones</li>
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
                        <h3 class="card-title">Lista de SubClasificaciones de {{ $clasificacion->titulo }}</h3>
                        <a href="{{ route('subclasificaciones.create', $clasificacion->id_Clasificacion) }}" class="btn btn-primary float-right">Crear Nuevo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Abreviación</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Icono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subclasificaciones as $subclasificacion)
                                <tr>
                                    <td>{{ $subclasificacion->id_Clasificacion }}</td>
                                    <td>{{ $subclasificacion->abreviacion }}</td>
                                    <td>{{ $subclasificacion->titulo }}</td>
                                    <td>{{ $subclasificacion->descripcion }}</td>
                                    <td><i class="fa {{ $subclasificacion->icono }}"></i></td>
                                    <td>
                                        <a href="{{ route('subclasificaciones.edit', [$clasificacion->id_Clasificacion, $subclasificacion->id_Clasificacion]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('subclasificaciones.destroy', [$clasificacion->id_Clasificacion, $subclasificacion->id_Clasificacion]) }}" method="POST" style="display:inline;">
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
                    <div class="card-footer">
                        <a href="{{ route('clasificaciones.index') }}" class="btn btn-secondary">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    console.log('Página de SubClasificaciones cargada.');
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection