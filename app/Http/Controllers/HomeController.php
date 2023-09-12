<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['apiUltimaVersionAndroid', 'descargarAndroidApp']);
    }

    public function index()
    {
        #TODO: seleccionar solo tickets dependiendo el rol
        $tickets =  Ticket::orderBy('id', 'DESC')->paginate(5);
        return view('home', compact('tickets'));
    }
    public function apiHome()
    {
        #TODO: seleccionar solo tickets dependiendo el rol
        $tickets =  Ticket::orderBy('id', 'DESC')->get();
        $datos = [];
        foreach ($tickets as $ticket) {
            $datos[] = [
                'id' => $ticket->id,
                'estatus' => $ticket->estatus->estatus,
                'area' => $ticket->sintoma->categoria->area->area,
                'categoria' => $ticket->sintoma->categoria->categoria,
                'sintoma' => $ticket->sintoma->sintoma,
                'usuarioFinal' => $ticket->usuario_final->nombre . ' ' . $ticket->usuario_final->apaterno . ' ' . $ticket->usuario_final->amaterno,
                'folio' => $ticket->folio,
                'prioridad' => $ticket->prioridad,
                'descripcion' => $ticket->descripcion,
            ];
        }
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Datos obtenidos",
            "datos" => $datos
        ]);
    }

    public function apiUltimaVersionAndroid()
    {
        return response()->json([
            'estatus' => 1,
            'última_version' => env('ANDROID_VERSION'),
        ]);
    }

    public function descargarAndroidApp()
    {
        return response()->download(storage_path('app/public/android_app/mesa_ayuda_' . env('ANDROID_VERSION') . '.apk'));
    }
}
