<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Evento;
use App\Models\User;
use Dotenv\Parser\Entry;
use PDF;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::all();
        $entradas = Entrada::all();

        return view('entradas.index', compact('eventos', 'entradas'));
    }

        public function show($id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('entradas.show', ['entrada' => $entrada]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::all();
        $usuarios = User::all();
        return view('entradas.create', compact('eventos', 'usuarios'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'evento_id' => 'required',
            'precio' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:1',
        ]);
    
        for ($i = 1; $i <= $validatedData['cantidad']; $i++) {
            $entrada = new Entrada();
            $entrada->evento_id = $validatedData['evento_id'];
            $entrada->precio = $validatedData['precio'];
            $entrada->vendida = 0;
            $entrada->save();
        }
    
        return redirect()->route('entradas.index')->with('success', 'Entradas creadas exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::find($id);
        $eventos = Evento::all();
        return view('entradas.edit', compact('entrada', 'eventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
    
        $entrada->precio = $request->input('precio');
        $entrada->vendida = $request->input('vendida');
    
        $entrada->save();
    
        return redirect()->route('entradas.show', ['id' => $entrada->id]);
    }

    public function entradasUsu()
    {
        $entradas = User::find(auth()->user()->id)->entradas;
        return view('entradas.misEntradas', compact('entradas'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrada = Entrada::find($id);
    
        if (!$entrada) {
            return redirect()->back()->with('error', 'La entrada que intentas borrar no existe.');
        }
    
        $entrada->delete();
    
        return redirect()->route('entradas.index')->with('success', 'entrada borrada correctamente.');
    }

    public function comprar($id)
    {
        $evento = Evento::find($id);
        $entradas = Entrada::all();
        $user = auth()->user();

        return view('entradas.comprar', compact('evento', 'entradas', 'user'));
    }
    
    public function descargarEntrada($id)
    {
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return redirect()->back()->with('error', 'Entrada no encontrada.');
        }

        $pdf = PDF::loadView('entradas.pdf', compact('entrada'));

        return $pdf->download('entrada.pdf');
    }
}