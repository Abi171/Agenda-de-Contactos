@extends('plantillas.plantilla')

@section('titulo','Contacto')

@section('contenido')

<div align="center">
  <h1 style="font-family: Verdana">Registro del Contacto {{ $contacto->nombre }} {{ $contacto->apellido }}</h1>
</div>
<br>
<br>

<table class="table table-dark table-hover" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Campos</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $contacto->nombre }}</td>
        </tr>
        <tr>
            <th scope="row">Apellido</th>
            <td>{{ $contacto->apellido }}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{ $contacto->correo_electronico }}</td>
        </tr>
        <tr>
            <th scope="row">Número de Teléfono</th>
            <td>{{ $contacto->telefono }}</td>
        </tr>
      
    </tbody>

  </table>

  <a class="btn btn-outline-primary" href="{{ route('contactos.index') }}">Regresar</a>
  <a class="btn btn-outline-warning" href="{{ route('contactos.edit' , ['id'=>$contacto->id]) }}">  Editar</a> 

@endsection