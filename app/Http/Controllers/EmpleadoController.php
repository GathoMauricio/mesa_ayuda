<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados =  User::where('cliente_id', \Auth::user()->cliente_id)->where('rol_id', '>', 2)->paginate(10);
        $roles = Rol::where('id', '>', 2)->get();
        return view('empleados.index', compact('empleados', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::where('id', '>', 2)->get();
        return view('empleados.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol_id' => 'required',
            'email' => 'required|unique:users',
            'nombre' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $empleado = User::create([
            'rol_id' => $request->rol_id,
            'cliente_id' => \Auth::user()->cliente_id,
            //'estatus' => 1,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'telefono' => $request->telefono,
            //'telefono_emergencia',
            'email' => $request->email,
            'direccion' => $request->direccion,
            'password' => $request->password,
            //'imagen',
        ]);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen =  $empleado->id . '.' . $imagen->guessExtension();
            $ruta = storage_path('app/public/img/empleados/');
            $imagen->move($ruta, $nombreImagen);
            $empleado->imagen = $nombreImagen;
            $empleado->save();
        }
        if ($empleado) {
            \Session::flash('success', 'El empleado ' . $empleado->nombre . ' ' . $empleado->apaterno . ' ' . $empleado->amaterno . ' se registró con éxito.');
            return redirect('/empleados');
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = User::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = User::findOrFail($id);
        $roles = Rol::where('id', '>', 2)->get();
        return view('empleados.edit', compact('empleado', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rol_id' => 'required',
            'nombre' => 'required',
        ]);
        $empleado = User::findOrFail($id);
        $empleado->rol_id = $request->rol_id;
        $empleado->nombre = $request->nombre;
        $empleado->apaterno = $request->apaterno;
        $empleado->amaterno = $request->amaterno;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen =  $empleado->id . '.' . $imagen->guessExtension();
            $ruta = storage_path('app/public/img/empleados/');
            $imagen->move($ruta, $nombreImagen);
            $empleado->imagen = $nombreImagen;
        }
        if ($empleado->save()) {
            \Session::flash('success', 'El empleado ' . $empleado->nombre . ' ' . $empleado->apaterno . ' ' . $empleado->amaterno . ' se actualizó con éxito.');
            return redirect('/empleados');
        } else {
            \Session::flash('error', 'Error al intentar actualizar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
