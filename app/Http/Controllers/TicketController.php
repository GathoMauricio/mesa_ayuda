<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Sintoma;

class TicketController extends Controller
{
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
        $areas = Area::orderBy('area')->get();
        return view('tickets.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'sintoma_id' => $request->sintoma_id,
            'folio' => 'TEST-000001',
            'prioridad' => $request->prioridad,
            'descripcion' => $request->descripcion,
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
