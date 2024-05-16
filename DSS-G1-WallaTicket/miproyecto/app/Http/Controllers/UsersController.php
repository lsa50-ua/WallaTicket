<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ordenar = $request->input('ordenar', 'nada'); // por defecto, ordenar por id
        $buscar = $request->input('buscar');
    
        if ($ordenar == 'alfabéticamente') {
            $usuarios = User::orderBy('email', 'asc');
        } else {
            $usuarios = User::query();
        }
    
        if (!empty($buscar)) {
            $usuarios = $usuarios->where('email', 'like', '%' . $buscar . '%');
        }
    
        $usuarios = $usuarios->paginate(3);
    
        $usuarios->appends(['ordenar' => $ordenar, 'buscar' => $buscar]);
    
        return view('users.index', compact('usuarios'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('users.show', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
    
        if (!$usuario) {
            return redirect()->back()->with('error', 'El usuario que intentas borrar no existe.');
        }
    
        $usuario->delete();
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario borrado correctamente.');
    }

    public function informacion()
    {
        return view('informacion');
    }

    public function contact()
    {
        return view('contact');
    }
}

