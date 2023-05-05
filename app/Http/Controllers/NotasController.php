<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function indexN(Request $request){
        $texto = trim($request->get('texto'));
        $notas = DB::table('notas')
        ->select('id','texto', 'fecha', 'contacto_id')
        ->where('texto', 'like', '%'.$texto.'%')
        ->OrWhere('id', 'like', '%'.$texto.'%')
        ->OrWhere('contacto_id', 'like', '%'.$texto.'%')
        ->orderBy('id', 'asc')
        ->paginate(5);
        
        return view('raizNotas')->with('notas',$notas);
    }

    public function showN($id){
        $nota = Nota::findOrFail($id);
        return view('notaIndividual')->with('nota',$nota);
    }

    public function createN(){
        return view('Nota');
    }

    public function storeN(Request $request){

        // validar
        $request->validate([
            'texto'=>'required|alpha',
            'fecha'=>'required|date',
            'contacto_id'=>'required|numeric'
        ]);

        $nuevoNota= new Nota();

        // formulario
        $nuevoNota->texto = $request->input('texto');
        $nuevoNota->fecha = $request->input('fecha');
        $nuevoNota->contacto_id = $request->input('contacto_id');

        $creado = $nuevoNota->save();

        if($creado){
            return redirect()->route('notas.index')->with('mensaje', 'Nota creada exitosamente');
        } else {
            return back();
        }
    }
    public function updateN(Request $request, $id){

        // validar
        $request->validate([
            'texto'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'fecha'=>'required|date',
            'contacto_id'=>'required|numeric'
        ]);

        $nota= Nota::findOrFail($id);

        // formulario
        $nota->texto = $request->input('texto');
        $nota->fecha = $request->input('fecha');
        $nota->contacto_id = $request->input('contacto_id');

        $creado = $nota->save();

        if($creado){
            return redirect()->route('notas.index')->with('mensaje', 'Nota modificada exitosamente');
        } else {
            return back();
        }
    }
    public function editN($id){
        $nota = Nota::findOrFail($id);
        return view('editarNota')->with('nota', $nota);
    }
    public function destroyN($id){
        Nota::destroy($id);

        return redirect()->route('notas.index')->with('mensaje', 'Nota Eliminado');
    }
}