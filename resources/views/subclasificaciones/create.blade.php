@extends('adminlte::page')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Clasificacion</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('clasificaciones.index') }}">Clasificaciones</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('subclasificaciones.index', $clasificacion->id_Clasificacion) }}">SubClasificaciones</a></li>
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
                        <h3 class="card-title">Datos de la Subclasificación de {{ $clasificacion->titulo }}</h3>
                    </div>
                    <form action="{{ route('subclasificaciones.store', $clasificacion->id_Clasificacion) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="abreviacion">Abreviación:</label>
                                <input type="text" class="form-control" id="abreviacion" name="abreviacion" value="{{ $clasificacion->abreviacion }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="45">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" maxlength="150"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="card-header">
                                            <i id="icon-preview" class="fa fa-5x"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <label for="icono">Icono:</label>
                                        <select class="form-control" id="icono" name="icono" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
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

                // Agregar la opción vacía al principio
                const emptyOption = document.createElement('option');
                emptyOption.value = '';
                emptyOption.textContent = 'Seleccionar Icono';
                select.appendChild(emptyOption);

                // Llenar el select con los iconos disponibles
                data.forEach(icon => {
                    const option = document.createElement('option');
                    option.value = icon;
                    option.innerHTML = `<i class="fa ${icon}"></i> ${icon}`;
                    select.appendChild(option);
                });

                // Mostrar la vista previa del primer icono al cargar la página (opcional)
                const iconPreview = document.getElementById('icon-preview');
                if (data.length > 0) {
                    iconPreview.className = `fa ${data[0]}`;
                }
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