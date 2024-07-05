<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Http\Controllers\IconController;

class SubclasificacionController extends Controller
{
    public function store(Request $request, $parentId)
    {
        // Crear una subclasificación
        $subclasificacion = new Clasificacion($request->all());

        // Establecer el valor de la próxima ID para subclasificaciones
        $lastId = Clasificacion::whereNotNull('parent_id')->max('id_Clasificacion') ?? 10000;
        $subclasificacion->id_Clasificacion = $lastId + 1;

        // Asignar parent_id
        $subclasificacion->parent_id = $parentId;

        $subclasificacion->save();
        return redirect()->route('subclasificaciones.index', $parentId);
    }

    public function index($parentId)
    {
        $clasificacion = Clasificacion::findOrFail($parentId);
        $subclasificaciones = Clasificacion::where('parent_id', $parentId)->get();
        return view('subclasificaciones.index', compact('clasificacion', 'subclasificaciones'));
    }

    public function create($parentId)
    {
        $clasificacion = Clasificacion::findOrFail($parentId);
        $iconController = new IconController();
        $icons = $iconController->getIcons()->original;
        return view('subclasificaciones.create', compact('clasificacion'));
    }

    public function edit($parentId, $id)
    {
        $clasificacion = Clasificacion::findOrFail($parentId);
        $subclasificacion = Clasificacion::findOrFail($id);
        $iconController = new IconController();
        $icons = $iconController->getIcons()->original;
        return view('subclasificaciones.edit', compact('clasificacion', 'subclasificacion'));
    }

    public function update(Request $request, $parentId, $id)
    {
        $subclasificacion = Clasificacion::findOrFail($id);
        $clasificacion = Clasificacion::findOrFail($parentId);
        $request->merge(['abreviacion' => $clasificacion->abreviacion]);
        $subclasificacion->update($request->all());
        return redirect()->route('subclasificaciones.index', $parentId);
    }

    public function destroy($parentId, $id)
    {
        Clasificacion::destroy($id);
        return redirect()->route('subclasificaciones.index', $parentId);
    }
}
