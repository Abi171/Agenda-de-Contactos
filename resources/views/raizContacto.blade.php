@extends('plantillas.plantilla')

@section('titulo','Lista de Contactos')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>

@endif

<h1>Contactos <a class="btn btn-outline-info" href="{{ route('contactos.crear') }}">Nuevo Contacto</a></h1>
<div class="col-xl-12 my-3">
        <form action="{{ route('contactos.index') }}" method="get">
            <div class="form-row">
                <div class="col-sm-4" >
                    <input type="text" class="form-control" name="texto" value="" >
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </div>
        </form>
</div>

<table class="table table-dark table-striped" class="pagination">

    <thead class="thead-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Ver Contacto</th>
            <th scope="col">Editar Contacto</th>
            <th scope="col">Eliminar Contacto</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($contactos as $contacto)
        <tr>
            <td scope="row">{{ $contacto->id }}</td>
            <td>{{ $contacto->nombre }} {{ $contacto->apellido }}</td>
            <td>{{ $contacto->correo_electronico }}</td>
            <td>{{ $contacto->telefono }}</td>
            <td><a  class="btn btn-outline-info" href="{{ route('contactos.mostrar' , ['id'=>$contacto->id]) }}" >Ver</a></td>
            <td><a  class="btn btn-outline-warning" href="{{ route('contactos.edit' , ['id'=>$contacto->id]) }}" >Editar</a></td>
            <td>
                <form method="POST" action="{{ route('contactos.borrar' , ['id'=>$contacto->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No hay Contactos</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $contactos->links() }}

@endsection