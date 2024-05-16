<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseña;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ReseñasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
         $buscar = $request->input('buscar');
         $ordenar = $request->input('ordenar', 'nada');
         if ($buscar) {
            $reseñas = Reseña::where('id', $buscar)->paginate(3);
         } else {             
     
             if ($ordenar == 'mejor_valoradas_y_mas_recientes') {
                 $reseñas = Reseña::orderBy('puntuacion', 'desc')
                                     ->orderBy('created_at', 'desc')
                                     ->paginate(3)
                                     ->appends(['ordenar' => $ordenar]);
             } else {
                 $reseñas = Reseña::paginate(3);
             }
         }
         
         return view('reseñas.index', compact('reseñas', 'buscar', 'ordenar'));
     }
     
     
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::all();
        $usuarios = User::all();
        return view('reseñas.create', compact('eventos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required',
            'puntuacion' => 'required|integer|min:0|max:5',
            'evento_id' => 'required|exists:eventos,id'
        ]);
    
        $reseña = new Reseña;
        $reseña->comentario = $request->comentario;
        $reseña->puntuacion = $request->puntuacion;
        $reseña->user_id = $request->user_id;
        $reseña->evento_id = $request->evento_id;
        $reseña->save();
    
        return redirect()->route('reseñas.index', $reseña->id)->with('success', 'La reseña se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reseña = Reseña::findOrFail($id);
        return view('reseñas.show', ['reseña' => $reseña]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reseña = Reseña::findOrFail($id);
        $eventos = Evento::all();
        $usuarios = User::all();
    
        return view('reseñas.edit', compact('reseña', 'eventos', 'usuarios'));
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
        $reseña = Reseña::findOrFail($id);
    
        $reseña->comentario = $request->input('comentario');
        $reseña->puntuacion = $request->input('puntuacion');
        $reseña->user_id = $request->input('user_id');
        $reseña->save();
    
        return redirect()->route('reseñas.show', ['id' => $reseña->id]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reseña = Reseña::find($id);
    
        if (!$reseña) {
            return redirect()->back()->with('error', 'La reseña que intentas borrar no existe.');
        }
    
        $reseña->delete();
    
        return redirect()->route('reseñas.index')->with('success', 'Reseña borrada correctamente.');
    }
}