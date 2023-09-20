<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sintoma;

class SintomaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function apiObtenerSintomasPorCategoria(Request $request)
    {
        $sintomas = Sintoma::where('categoria_id', $request->categoria_id)->orderBy('sintoma')->get();
        return response()->json($sintomas);
    }
}
