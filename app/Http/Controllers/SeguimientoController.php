<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;

class SeguimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $seguimiento = Seguimiento::create($request->all());
        if ($seguimiento) {
            #TODO: Notificar via email a los usuarios correspondientes
            \Session::flash('success', 'El seguimiento se creó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
}
