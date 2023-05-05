<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\DB;

class ContactosController extends Controller
{
    public function index(Request $request){
        $texto = trim($request->get('texto'));
        $contactos = DB::table('contactos')
        ->select('id', 'nombre', 'apellido', 'correo_electronico', 'telefono')
        ->where('nombre', 'like', '%'.$texto.'%')
        ->OrWhere('id', 'like', '%'.$texto.'%')
        ->orderBy('id', 'asc')
        ->paginate(5);

        return view('raizContacto')->with('contactos',$contactos, 'texto', $texto);
    }

    public function show($id){
        $contacto = Contacto::findOrFail($id);
        return view('contactoIndividual', compact('contactos','texto'))->with('contacto',$contacto, 'texto', $texto);
    }

    public function create(){
        return view('formularioContacto');
    }

    public function store(Request $request){

        // validar
        $request->validate([
            'nombre'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'apellido'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'correo_electronico'=>'unique:contactos,correo_electronico',
            'telefono'=>'required|numeric|unique:contactos,telefono'
        ]);

        $nuevoContacto = new Contacto();

        // formulario
        $nuevoContacto->nombre = $request->input('nombre');
        $nuevoContacto->apellido = $request->input('apellido');
        $nuevoContacto->correo_electronico = $request->input('correo');
        $nuevoContacto->telefono = $request->input('telefono');

        $creado = $nuevoContacto->save();

        if($creado){
            return redirect()->route('contactos.index')->with('mensaje', 'Contacto creado exitosamente');
        } else {
            return back();
        }
    }
    public function update(Request $request, $id){

        // validar
        $request->validate([
            'nombre'=>'required|alpha',
            'apellido'=>'required|alpha',
            'correo_electronico'=>'unique:contactos,correo_electronico',
            'telefono'=>'required|unique:contactos,telefono'
        ]);

        $contacto = Contacto::findOrFail($id);

        // formulario
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->correo_electronico = $request->input('correo');
        $contacto->telefono = $request->input('telefono');

        $creado = $contacto->save();

        if($creado){
            return redirect()->route('contactos.index')->with('mensaje', 'Contacto editado exitosamente');
        } else {
            return back();
        }
    }

    public function edit($id){
        $contacto = Contacto::findOrFail($id);
        return view('formularioEditarContacto')->with('contacto', $contacto);
    }
    public function destroy($id){
        Contacto::destroy($id);

        return redirect()->route('contactos.index')->with('mensaje', 'Contacto Eliminado');
    }
}
