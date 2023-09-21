<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Sintoma;

class CatalogoController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('area')->paginate(10);
        $categorias = Categoria::orderBy('categoria')->paginate(10);
        $sintomas = Sintoma::orderBy('sintoma')->paginate(10);
        return view('catalogos.index', compact('areas', 'categorias', 'sintomas'));
    }

    public function guardarArea(Request $request)
    {
        $request->validate(['area' => 'required'], ['area.required' => 'Campo obligatorio']);
        $area = Area::create(['area' => $request->area]);
        if ($area) {
            \Session::flash('success', 'El registro se creó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function guardarCategoria(Request $request)
    {
        $request->validate(
            [
                'area_id' => 'required',
                'categoria' => 'required',
            ],
            [
                'area_id.required' => 'Campo obligatorio',
                'categoria.required' => 'Campo obligatorio',
            ]
        );

        $categoria = Categoria::create([
            'area_id' => $request->area_id,
            'categoria' => $request->categoria
        ]);

        if ($categoria) {
            \Session::flash('success', 'El registro se creó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function guardarSintoma(Request $request)
    {
        $request->validate(
            [
                'area_id' => 'required',
                'categoria_id' => 'required',
                'sintoma' => 'required',
            ],
            [
                'area_id.required' => 'Campo obligatorio',
                'categoria_id.required' => 'Campo obligatorio',
                'sintoma.required' => 'Campo obligatorio',
            ]
        );
        $sintoma = Sintoma::create([
            'area_id' => $request->area_id,
            'categoria_id' => $request->categoria_id,
            'sintoma' => $request->sintoma,
        ]);

        if ($sintoma) {
            \Session::flash('success', 'El registro se creó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar crear el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function eliminarArea($id)
    {
        $area = Area::findOrFail($id);
        if ($area->delete()) {
            \Session::flash('success', 'El registro se eliminó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar eliminar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
    public function eliminarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        if ($categoria->delete()) {
            \Session::flash('success', 'El registro se eliminó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar eliminar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
    public function eliminarSintoma($id)
    {
        $sintoma = Sintoma::findOrFail($id);
        if ($sintoma->delete()) {
            \Session::flash('success', 'El registro se eliminó correctamente');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Error al intentar eliminar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }
}
