@extends('plantillas.plantilla')

@section('titulo','nota')

@section('contenido')

<div align="center">
  <h1 style="font-family: Verdana">Nota {{ $nota->id }}</h1>
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
            <th scope="row">Texto</th>
            <td>{{ $nota->texto }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha</th>
            <td>{{ $nota->fecha }}</td>
        </tr>
    
        <tr>
            <th scope="row">Id del contacto</th>
            <td>{{ $nota->contacto_id }}</td>
        </tr>
      
    </tbody>

  </table>

  <a class="btn btn-outline-primary" href="{{ route('notas.index') }}">Regresar</a>
  <a class="btn btn-outline-warning" href="{{ route('notas.edit' , ['id'=>$nota->id]) }}">  Editar</a> 

@endsection