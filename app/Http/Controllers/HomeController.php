<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Seguimiento;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['apiUltimaVersionAndroid', 'descargarAndroidApp']);
    }

    public function index()
    {
        if (\Auth::user()->rol_id != 1) {
            $tickets =  Ticket::where('cliente_id', \Auth::user()->cliente_id)->orderBy('id', 'DESC')->paginate(5);
            return view('home', compact('tickets'));
        } else {

            $clientes = Cliente::orderBy('razon_social')->get();
            return view('super_user.home', compact('clientes'));
        }
    }
    public function apiHome()
    {
        #TODO: seleccionar solo tickets dependiendo el rol
        $tickets =  Ticket::orderBy('id', 'DESC')->get();
        $datos = [];
        foreach ($tickets as $ticket) {
            $seguimientos = Seguimiento::where('ticket_id', $ticket->id)->orderBy('id', 'DESC')->get();
            $seguimientos_datos = [];
            foreach ($seguimientos as $seguimiento) {
                $seguimientos_datos[] = [
                    'id' => $seguimiento->id,
                    'ticket_id' => $seguimiento->ticket_id,
                    'autor' => $seguimiento->autor->nombre . ' ' . $seguimiento->autor->apaterno . ' ' . $seguimiento->autor->amaterno,
                    'texto' => $seguimiento->texto,
                    'created_at' => $seguimiento->created_at,
                ];
            }
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
                'seguimientos' => $seguimientos_datos,
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
