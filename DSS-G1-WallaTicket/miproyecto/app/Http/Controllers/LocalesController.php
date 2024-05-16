<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Local;
use Illuminate\Support\Facades\Validator;

class LocalesController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
{
    // Verifica si el usuario está autenticado
    if (!auth()->check()) {
        return redirect('/login');
    }

    $ordenar = $request->input('ordenar', 'nada');
    $buscar = $request->input('buscar');

    $query = Local::query();

    if ($ordenar == 'alfabéticamente') {
        $query->orderBy('empresa', 'asc');
    }

    if (!empty($buscar)) {
        $query->where('empresa', 'like', '%' . $buscar . '%');
    }

    $locales = $query->paginate(3);

    $locales->appends(['ordenar' => $ordenar, 'buscar' => $buscar]);

    return view('locales.index', compact('locales'));
}

    public function create()
    {
        return view('locales.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'urlImagen' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Rellene todos los campos. (Maximo 255)');
        }

            $empresa = $req->input('nombre');
            $direccion = $req->input('direccion');
            $urlFoto = $req->input('urlImagen');

            $local = Local::where('empresa', '=', $empresa)->first();

            if ($local == null) {
                $localNew = new Local();
                $localNew->empresa = $empresa;
                $localNew->direccion = $direccion;
                $localNew->foto = $urlFoto;
                $localNew->updated_at = now();
                $localNew->created_at = now();
                $localNew->save();

                return redirect("/locales/" . strval($localNew->id))->with('exito', 'Se ha insertado correctamente el local');
            } else {
                return redirect()->back()->with('error', 'Error ya existe el Local');
            }
    }

    public function show($id){
        $local = Local::findOrFail($id);
        return view('locales.show', ['local' => $local]);
    }

    public function edit($id)
    {
        $local = Local::findOrFail($id);
    
        return view('locales.edit', ['local' => $local]);
    }

    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'empresa' => 'required|max:255',
            'direccion' => 'required|max:255',
            'foto' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Rellene todos los campos. (Maximo 255)');
        }
        $local = Local::findOrFail($id);
    
        $local->empresa = $req->input('empresa');
        $local->direccion = $req->input('direccion');
        $local->foto = $req->input('foto');
        $local->save();
    
        return redirect()->route('locales.show', ['id' => $local->id]);
    }

    public function destroy($id)
    {
        $local = Local::find($id);
    
        if (!$local) {
            return redirect()->back()->with('error', 'El local que intentas borrar no existe.');
        }
    
        $local->delete();
    
        return redirect()->route('locales.index')->with('success', 'Local borrado correctamente.');
    }

    public function esAdmin()
    {
        return Auth::check() && Auth::user()->esAdmin();
    }
}