<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        #TODO: seleccionar solo tickets dependiendo el rol
        $tickets =  Ticket::orderBy('folio', 'DESC')->paginate(5);
        return view('home', compact('tickets'));
    }
}
