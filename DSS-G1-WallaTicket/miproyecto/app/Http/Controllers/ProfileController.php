<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user(); // Obtener el usuario autenticado

        return view('profile.show', compact('user'));
    }

}
