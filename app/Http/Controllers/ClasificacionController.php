<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Http\Controllers\IconController;


class ClasificacionController extends Controller
{

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'abreviacion' => 'required|string',
            'titulo' => 'required|string',
            'descripcion' => 'nullable|string',
            'icono' => 'required|string',
            'parent_id' => 'nullable|integer',
        ]);

        // Crea una nueva clasificación con los datos recibidos
        $clasificacion = new Clasificacion($request->all());

        // Establecer el valor de la próxima ID para clasificaciones principales si no tiene subclasificación
        if (is_null($clasificacion->parent_id)) {
            $lastId = Clasificacion::whereNull('parent_id')->max('id_Clasificacion') ?? 0;
            $clasificacion->id_Clasificacion = ($lastId < 10000) ? $lastId + 1 : 1;
        }

        $clasificacion->save();
        return redirect()->route('clasificaciones.index');
    }

    public function index()
    {
        $clasificaciones = Clasificacion::whereNull('parent_id')->get();
        return view('clasificaciones.index', compact('clasificaciones'));
    }

    public function create()
    {
        $iconController = new IconController();
        $icons = $iconController->getIcons()->original;
        return view('clasificaciones.create', compact('icons'));
    }


    public function edit($id)
    {
        $clasificacion = Clasificacion::findOrFail($id);
        $iconController = new IconController();
        $icons = $iconController->getIcons()->original;
        return view('clasificaciones.edit', compact('clasificacion', 'icons'));
    }

    public function update(Request $request, $id)
    {
        $clasificacion = Clasificacion::findOrFail($id);
        $clasificacion->update($request->all());
        return redirect()->route('clasificaciones.index');
    }

    public function destroy($id)
    {
        Clasificacion::destroy($id);
        return redirect()->route('clasificaciones.index');
    }
}
