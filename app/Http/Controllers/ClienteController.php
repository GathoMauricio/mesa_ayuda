<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('razon_social')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required',
            'email' => 'required|unique:users',
            'nombre' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $cliente = Cliente::create([
            'razon_social' => strtoupper($request->razon_social),
            'rfc' => strtoupper($request->rfc),
            'direccion' => $request->direccion
        ]);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen =  $cliente->id . '.' . $imagen->guessExtension();
            $ruta = storage_path('app/public/img/clientes/');
            $imagen->move($ruta, $nombreImagen);
            $cliente->imagen = $nombreImagen;
            $cliente->save();
        }
        if ($cliente) {
            $user = User::create([
                'rol_id' => 2,
                'cliente_id' => $cliente->id,
                'nombre' => $request->nombre,
                'apaterno' => $request->apaterno,
                'amaterno' => $request->amaterno,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }
        if ($cliente && $user) {
            \Session::flash('success', 'El cliente ' . $cliente->razon_social . ' se registró con éxito.');
            return redirect('/clientes');
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $administrador = User::where('cliente_id', $id)->where('rol_id', 2)->first();
        $empleados = User::where('cliente_id', $id)->where('rol_id', '!=', 2)->get();
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('administrador', 'empleados', 'cliente'));
    }

    public function edit($id)
    {
        $administrador = User::where('cliente_id', $id)->where('rol_id', 2)->first();
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('administrador', 'cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'razon_social' => 'required',
            'nombre' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->razon_social = strtoupper($request->razon_social);
        $cliente->rfc = strtoupper($request->rfc);
        $cliente->direccion = $request->direccion;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen =  $cliente->id . '.' . $imagen->guessExtension();
            $ruta = storage_path('app/public/img/clientes/');
            $imagen->move($ruta, $nombreImagen);
            $cliente->imagen = $nombreImagen;
        }

        $administrador = User::where('cliente_id', $id)->where('rol_id', 2)->first();

        $administrador->nombre = $request->nombre;
        $administrador->apaterno = $request->apaterno;
        $administrador->amaterno = $request->amaterno;

        if ($cliente->save() && $administrador->save()) {
            \Session::flash('success', 'El cliente ' . $cliente->razon_social . ' se actualizó con éxito.');
            return redirect('/clientes');
        } else {
            \Session::flash('error', 'Error al intentar actualizar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $usuarios = User::where('cliente_id', $id);
        if ($cliente->delete() && $usuarios->delete()) {
            \Session::flash('success', 'El cliente  se eliminó con éxito.');
            return redirect('/clientes');
        } else {
            \Session::flash('error', 'Error al intentar eliminar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
}
