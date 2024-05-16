<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends BaseController
{

    public function index(Request $request)
    {
        $ordenar = $request->input('ordenar', 'nada');
        $buscar = $request->input('buscar');
    
        if ($ordenar == 'aforo') {
            $eventos = Evento::orderBy('aforo', 'desc');
        } else if ($ordenar == 'fecha')  {
            $eventos = Evento::orderBy('fecha');
        }else{
            $eventos = Evento::query();
        }
    
        if (!empty($buscar)) {
            $eventos = $eventos->where('nombre_evento', 'like', '%' . $buscar . '%');
        }
    
        $eventos = $eventos->paginate(3);
    
        $eventos->appends(['ordenar' => $ordenar, 'buscar' => $buscar]);
        return view('eventos.index', compact('eventos'));
    }
    
    public function indexPrincipal()
    {
        $eventos = Evento::orderBy('fecha')->paginate(3); // Obtener los eventos paginados de 3 en 3 y ordenados por fecha
    
        return view('inicio', ['eventos' => $eventos]); // Retornar la vista de la página principal e incluir los eventos
    }


    public function show($id){
        $evento = Evento::findOrFail($id);
        return view('eventos.show', ['evento' => $evento]);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre_evento = $request->input('nombre_evento');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->tipo = $request->input('tipo');
        $evento->aforo = $request->input('aforo');
        $evento->edad_minima = $request->input('edad_minima');
        $evento->foto = $request->input('foto');
        $evento->save();

        return redirect()->route('inicio');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
    
        if (!$evento) {
            return redirect()->back()->with('error', 'El evento que intentas borrar no existe.');
        }
    
        $evento->delete();
    
        return redirect()->route('eventos.index')->with('success', 'Evento borrado correctamente.');
    }
}