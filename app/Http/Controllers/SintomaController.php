<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sintoma;

class SintomaController extends Controller
{
    public function apiObtenerSintomasPorCategoria(Request $request)
    {
        $sintomas = Sintoma::where('categoria_id', $request->categoria_id)->orderBy('sintoma')->get();
        return response()->json($sintomas);
    }
}
