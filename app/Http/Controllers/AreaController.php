<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function apiObtenerAreas()
    {
        $areas = Area::orderBy('area')->get();
        return response()->json($areas);
    }
}
