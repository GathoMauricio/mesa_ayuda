<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Sintoma;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cargarCategorias($area_id)
    {
        $categorias = Categoria::where('area_id', $area_id)->get();
        return response()->json($categorias);
    }

    public function cargarSintomas($categoria_id)
    {
        $sintomas = Sintoma::where('categoria_id', $categoria_id)->get();
        return response()->json($sintomas);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        if (\Auth::user()->rol_id != 1) {
            $areas = Area::orderBy('area')->get();
            return view('tickets.create', compact('areas'));
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'area' => 'required',
            'sintoma_id' => 'required',
            'prioridad' => 'required',
            'descripcion' => 'required',
        ], [
            'categoria.required' => 'Campo requerido.',
            'area.required' => 'Campo requerido.',
            'sintoma_id.required' => 'Campo requerido.',
            'prioridad.required' => 'Campo requerido.',
            'descripcion.required' => 'Campo requerido.',
        ]);

        $ticket = Ticket::create([
            'sintoma_id' => $request->sintoma_id,
            'folio' => 'T-' . $this->generaFolio(),
            'prioridad' => $request->prioridad,
            'descripcion' => $request->descripcion,
            'origen' => 'Web'
        ]);
        if ($ticket) {
            #TODO: Notificar via email a los usuarios correspondientes
            \Session::flash('success', 'El ticket se creo correctamente con el folio ' . $ticket->folio);
            return redirect()->route('home');
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
    public function apiStoreTicket(Request $request)
    {
        $ticket = Ticket::create([
            'sintoma_id' => $request->sintomaId,
            'folio' => 'T-' . $this->generaFolio(),
            'prioridad' => $request->prioridad,
            'descripcion' => $request->descripcion,
            'origen' => 'Móvil'
        ]);
        if ($ticket) {
            #TODO: Notificar via email a los usuarios correspondientes
            return response()->json([
                'estatus' => 1,
                'mensaje' => 'El ticket se creo correctamente con el folio ' . $ticket->folio,
                'ticket' => $ticket
            ]);
        } else {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Error al intentar crear el registro por favor intente de nuevo.'
            ]);
        }
    }

    private function generaFolio()
    {
        $pre = \Auth::user()->cliente_id . '|';
        $last_ticket = Ticket::where('folio', 'like', '%' . $pre . '%')->orderBy('folio', 'DESC')->first();
        if ($last_ticket) {
            $parts = explode('|', $last_ticket->folio);
            $newFolio = intval($parts[1]) + 1;
            $folioString = $pre;
            if ($newFolio <= 9) {
                $folioString .= '00000' . $newFolio;
            }
            if ($newFolio > 9 && $newFolio <= 99) {
                $folioString .= '0000' . $newFolio;
            }
            if ($newFolio > 99 && $newFolio <= 999) {
                $folioString .= '000' . $newFolio;
            }
            if ($newFolio > 999 && $newFolio <= 9999) {
                $folioString .= '00' . $newFolio;
            }
            if ($newFolio > 9999 && $newFolio <= 99999) {
                $folioString .= '0' . $newFolio;
            }
            if ($newFolio > 99999) {
                $folioString .=  $newFolio;
            }
            return $folioString;
        } else {
            return $pre . '000001';
        }
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $areas = Area::orderBy('area')->get();
        return view('tickets.edit', compact('ticket', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required',
            'area' => 'required',
            'sintoma_id' => 'required',
            'prioridad' => 'required',
            'descripcion' => 'required',
        ], [
            'categoria.required' => 'Campo requerido.',
            'area.required' => 'Campo requerido.',
            'sintoma_id.required' => 'Campo requerido.',
            'prioridad.required' => 'Campo requerido.',
            'descripcion.required' => 'Campo requerido.',
        ]);
        $ticket = Ticket::findOrFail($id);
        $ticket->sintoma_id = $request->sintoma_id;
        $ticket->prioridad = $request->prioridad;
        $ticket->descripcion = $request->descripcion;
        if ($ticket->save()) {
            \Session::flash('success', 'El ticket ' . $ticket->folio . ' se actualizó correctamente');
            return redirect()->route('home');
        } else {
            \Session::flash('error', 'Error al intentar actualizar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
