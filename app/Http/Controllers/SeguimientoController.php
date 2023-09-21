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

    public function apiStoreSeguimiento(Request $request)
    {
        $seguimiento = Seguimiento::create([
            'ticket_id' => $request->ticketId,
            'texto' => $request->texto,
        ]);
        if ($seguimiento) {
            return response()->json([
                'estatus' => 1,
                'mensaje' => "Seguimiento almacenado en el folio " . $seguimiento->ticket->folio
            ]);
        } else {
            return response()->json([
                'estatus' => 0,
                'mensaje' => "Error al crear el registro"
            ]);
        }
    }
}
