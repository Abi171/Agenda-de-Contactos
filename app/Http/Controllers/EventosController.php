<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;

class EventosController extends Controller
{
    public function indexE(Request $request){
        $texto = trim($request->get('texto'));
        $eventos = DB::table('eventos')
        ->select('id','titulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'contacto_id')
        ->where('titulo', 'like', '%'.$texto.'%')
        ->OrWhere('id', 'like', '%'.$texto.'%')
        ->OrWhere('contacto_id', 'like', '%'.$texto.'%')
        ->orderBy('id', 'asc')
        ->paginate(5);
        return view('raizEventos')->with('eventos', $eventos);
    }
    public function showE($id){
        $evento = Evento::findOrFail($id);
        return view('EventoIndividual')->with('evento',$evento);
    }
    public function createE(){
        return view('Evento');
    }
    public function storeE(Request $request){

        // validar
        $request->validate([
            'titulo'=>'required|alpha',
            'descripcion'=>'required|alpha',
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date',
            'contacto_id'=>'required|numeric'
        ]);

        $nuevoEvento= new Evento();

        // formulario
        $nuevoEvento->titulo = $request->input('titulo');
        $nuevoEvento->descripcion = $request->input('descripcion');
        $nuevoEvento->fecha_inicio = $request->input('fecha_inicio');
        $nuevoEvento->fecha_fin = $request->input('fecha_fin');
        $nuevoEvento->contacto_id = $request->input('contacto_id');

        $creado = $nuevoEvento->save();

        if($creado){
            return redirect()->route('eventos.index')->with('mensaje', 'Evento creado exitosamente');
        } else {
            return back();
        }
    }
    public function updateE(Request $request, $id){

        // validar
        $request->validate([
            'titulo'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'descripcion'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date',
            'contacto_id'=>'required|numeric'
        ]);

        $evento= Evento::findOrFail($id);

        // formulario
        $evento->titulo = $request->input('titulo');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_inicio = $request->input('fecha_inicio');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->contacto_id = $request->input('contacto_id');

        $creado = $evento->save();

        if($creado){
            return redirect()->route('eventos.index')->with('mensaje', 'Evento modificado exitosamente');
        } else {
            return back();
        }
    }
    public function editE($id){
        $evento = Evento::findOrFail($id);
        return view('EditarEvento')->with('evento', $evento);
    }
    public function destroyE($id){
        Evento::destroy($id);

        return redirect()->route('eventos.index')->with('mensaje', 'Evento Eliminado');
    }
}