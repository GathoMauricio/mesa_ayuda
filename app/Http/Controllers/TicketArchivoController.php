<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketArchivoController extends Controller
{
    public function descargarArchivo(Request $request)
    {
        return response()->download(storage_path('app/public/archivos/' . $request->ticket_id . '/' . $request->archivo));
    }
}
