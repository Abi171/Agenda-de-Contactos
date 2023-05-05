@extends('plantillas.plantilla')

@section('titulo', 'Registro de Contacto')

@section('contenido')

<h1>Contacto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="">
    @csrf
    <div class="form-group">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Contacto">
    </div>
    <div class="form-group">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido del Contacto">
    </div>
    <div class="form-group">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input type="text" class="form-control" name="correo" id="correo" placeholder="ejemplo@gmail.com">
    </div>
    <div class="form-group">
        <label for="telefono" class="form-label">Número de Teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="# de Teléfono">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type="reset" class="btn btn-danger" value="Restablecer">
  
</form>

@endsection
