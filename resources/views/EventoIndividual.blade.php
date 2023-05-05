@extends('plantillas.plantilla')

@section('titulo','Evento')

@section('contenido')

<div align="center">
  <h1 style="font-family: Verdana">Evento {{ $evento->id }}</h1>
</div>


<table class="table table-dark table-hover" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Campos</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Título</th>
            <td>{{ $evento->titulo }}</td>
        </tr>
        <tr>
            <th scope="row">Descripción</th>
            <td>{{ $evento->descripcion }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha y hora de Inicio</th>
            <td>{{ $evento->fecha_inicio }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha y hora de Fin</th>
            <td>{{ $evento->fecha_fin }}</td>
        </tr>
        <tr>
            <th scope="row">Id del contacto</th>
            <td>{{ $evento->contacto_id }}</td>
        </tr>
      
    </tbody>

  </table>

  <a class="btn btn-outline-primary" href="{{ route('eventos.index') }}">Regresar</a>
  <a class="btn btn-outline-warning" href="{{ route('eventos.edit' , ['id'=>$evento->id]) }}">  Editar</a> 

@endsection