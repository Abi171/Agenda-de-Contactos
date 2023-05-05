@extends('plantillas.plantilla')

@section('titulo', 'Nuevo Evento')

@section('contenido')

<h1>Nuevo Evento</h1>

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
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título del Evento">
    </div>
    <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del Evento">
    </div>
    <div class="form-group">
        <label for="fecha_inicio" class="form-label"> Fecha y Hora de Inicio</label>
        <input type="datetime" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="####-##-##   ##:##:##">
    </div>
    <div class="form-group">
        <label for="fecha_fin" class="form-label"> Fecha y Hora de Fin</label>
        <input type="datetime" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="####-##-##   ##:##:##">
    </div>
    <div class="form-group">
        <label for="contacto_id" class="form-label">Id del Contacto</label>
        <input type="text" class="form-control" name="contacto_id" id="contacto_id" placeholder="Id del contacto">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type="reset" class="btn btn-danger" value="Restablecer">
  
</form>

@endsection