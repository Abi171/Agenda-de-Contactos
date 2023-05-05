@extends('plantillas.plantilla')

@section('titulo', 'Nueva Nota')

@section('contenido')

<h1>Nueva Nota</h1>

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
    @method('put')    
    @csrf
    <div class="form-group">
        <label for="texto" class="form-label">Texto</label>
        <input type="text" class="form-control" name="texto" id="texto" value="{{ $nota->texto }}">
    </div>
    <div class="form-group">
        <label for="fecha" class="form-label"> Fecha y Hora</label>
        <input type="datetime" class="form-control" name="fecha" id="fecha" value="{{ $nota->fecha }}">
    </div>
    <div class="form-group">
        <label for="contacto_id" class="form-label">Id del Contacto</label>
        <input type="text" class="form-control" name="contacto_id" id="contacto_id" value="{{ $nota->contacto_id}}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type="reset" class="btn btn-danger" value="Restablecer">
  
</form>

@endsection