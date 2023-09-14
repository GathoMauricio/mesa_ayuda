<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function apiObtenerCategoriasPorArea(Request $request)
    {
        $categorias = Categoria::where('area_id', $request->area_id)->orderBy('categoria')->get();
        return response()->json($categorias);
    }
}
