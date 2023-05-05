@extends('plantillas.plantilla')

@section('titulo','Lista de Notas')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>

@endif

<h1>Notas       <a class="btn btn-outline-info" href="{{ route('notas.crear') }}" >  Nueva Nota</a></h1>
<div class="col-xl-12 my-3">
        <form action="{{ route('notas.index') }}" method="get">
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
            <th scope="col">Texto</th>
            <th scope="col">Fecha y hora</th>
            <th scope="col">Id del Contacto</th>
            <th scope="col">Ver Nota</th>
            <th scope="col">Editar Nota</th>
            <th scope="col">Eliminar Nota</th>
          
        </tr>
    </thead>
    <tbody>
        @forelse ($notas as $nota)
        <tr>
            <td scope="row">{{ $nota->id }}</td>
            <td>{{ $nota->texto }} </td>
            <td>{{ $nota->fecha }}</td>
            <td>{{ $nota->contacto_id }}</td>
            <td><a  class="btn btn-outline-info" href="{{ route('notas.mostrar' , ['id'=>$nota->id]) }}" >Ver</a></td>
            <td><a  class="btn btn-outline-warning" href="{{ route('notas.update' , ['id'=>$nota->id]) }}" >Editar</a></td>
            <td>
                <form method="POST" action="{{ route('notas.borrar' , ['id'=>$nota->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-outline-danger">
                </form>
            </td>
            
        </tr>
        @empty
        <tr>
            <td colspan="4">No hay Notas</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $notas->links() }}

@endsection