@extends('adminlte::page')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar SubClasificación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{ route('clasificaciones.index') }}">Clasificaciones</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('subclasificaciones.index', $clasificacion->id_Clasificacion) }}">SubClasificaciones</a></li>
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
                        <h3 class="card-title">Actualizar Datos de la SubClasificacion</h3>
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
                    <form action="{{ route('subclasificaciones.update', [$clasificacion->id_Clasificacion, $subclasificacion->id_Clasificacion]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="abreviacion">Abreviación:</label>
                                <input type="text" class="form-control" id="abreviacion" name="abreviacion" value="{{ $clasificacion->abreviacion }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $subclasificacion->titulo }}" required maxlength="45">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" maxlength="150">{{ $subclasificacion->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="card-header">
                                            <i id="icon-preview" class="fa {{ $subclasificacion->icono }} fa-5x"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <label for="icono">Icono:</label>
                                        <select class="form-control" id="icono" name="icono" required>
                                            <option value="{{ $subclasificacion->icono }}" selected>{{ $subclasificacion->icono }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('subclasificaciones.index', $clasificacion->id_Clasificacion) }}" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/icons')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('icono');
                data.forEach(icon => {
                    const option = document.createElement('option');
                    option.value = icon;
                    option.innerHTML = `<i class="fa ${icon}"></i> ${icon}`;
                    select.appendChild(option);
                });

                // Mostrar la vista previa del icono seleccionado al cargar la página
                const iconPreview = document.getElementById('icon-preview');
                const selectedIcon = select.value;
                iconPreview.className = `fa ${selectedIcon}`;
            });

        // Mostrar la vista previa del icono seleccionado al cambiar la opción
        document.getElementById('icono').addEventListener('change', function() {
            const iconPreview = document.getElementById('icon-preview');
            const selectedIcon = this.value;
            iconPreview.className = `fa ${selectedIcon}`;
        });
    });
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection