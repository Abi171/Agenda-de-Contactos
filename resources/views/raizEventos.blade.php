@extends('plantillas.plantilla')

@section('titulo','Lista de Notas')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>

@endif

<h1>Eventos       <a class="btn btn-outline-info" href="{{ route('eventos.crear') }}" >  Nuevo Evento</a></h1>
<div class="col-xl-12 my-3">
        <form action="{{ route('eventos.index') }}" method="get">
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
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Fin</th>
            <th scope="col">Id del Contacto</th>
            <th scope="col">Ver Evento</th>
            <th scope="col">Editar Evento</th>
            <th scope="col">Eliminar Evento</th>
          
        </tr>
    </thead>
    <tbody>
        @forelse ($eventos as $evento)
        <tr>
            <td scope="row">{{ $evento->id }}</td>
            <td>{{ $evento->titulo }} </td>
            <td>{{ $evento->descripcion }}</td>
            <td>{{ $evento->fecha_inicio }}</td>
            <td>{{ $evento->fecha_fin }}</td>
            <td>{{ $evento->contacto_id }}</td>
            <td><a  class="btn btn-outline-info" href="{{ route('eventos.mostrar' , ['id'=>$evento->id]) }}" >Ver</a></td>
            <td><a  class="btn btn-outline-warning" href="{{ route('eventos.update' , ['id'=>$evento->id]) }}" >Editar</a></td>
            <td>
                <form method="POST" action="{{ route('eventos.borrar' , ['id'=>$evento->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-outline-danger">
                </form>
            </td>

            
        </tr>
        @empty
        <tr>
            <td colspan="6">No hay Eventos</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $eventos->links() }}

@endsection