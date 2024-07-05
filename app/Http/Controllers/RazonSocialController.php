<?php

namespace App\Http\Controllers;

use App\Models\RazonSocial;
use Illuminate\Http\Request;
use App\Models\Clasificacion;

class RazonSocialController extends Controller
{
    public function index()
    {
        $razonSocials = RazonSocial::with('tipoPersonaClasificacion', 'rolClasificacion')->get();
        return view('razon_social.index', compact('razonSocials'));
    }

    public function edit($id)
    {
        $razonSocial = RazonSocial::findOrFail($id);
        $tipoPersonas = Clasificacion::where('abreviacion', 'RS')->pluck('titulo', 'id_Clasificacion');
        $roles = Clasificacion::where('abreviacion', 'RO')->pluck('titulo', 'id_Clasificacion');
        return view('razon_social.edit', compact('razonSocial', 'tipoPersonas', 'roles'));
    }

    public function create()
    {
        $tipoPersonas = Clasificacion::where('abreviacion', 'RS')->pluck('titulo', 'id_Clasificacion');
        $roles = Clasificacion::where('abreviacion', 'RO')->pluck('titulo', 'id_Clasificacion');
        return view('razon_social.create', compact('tipoPersonas', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCompleto' => 'required|max:45',
            'tipoPersona' => 'required|integer',
            'nroIdentificacion' => 'required|integer',
            'telefono' => 'required|max:15',
            'email' => 'nullable|max:45',
            'direccion' => 'nullable|max:150',
            'rol' => 'required|integer',
            'contraseña' => 'nullable|max:45',
        ]);

        RazonSocial::create($request->all());

        return redirect()->route('razon_social.index')->with('success', 'Razón Social creada exitosamente.');
    }

    public function show(RazonSocial $razonSocial)
    {
        return view('razon_social.show', compact('razonSocial'));
    }

    public function update(Request $request, RazonSocial $razonSocial)
    {
        $request->validate([
            'nombreCompleto' => 'required|max:45',
            'tipoPersona' => 'required|integer',
            'nroIdentificacion' => 'required|integer',
            'telefono' => 'required|max:15',
            'email' => 'nullable|max:45',
            'direccion' => 'nullable|max:150',
            'rol' => 'required|integer',
            'contraseña' => 'nullable|max:45',
        ]);

        $razonSocial->update($request->all());

        return redirect()->route('razon_social.index')->with('success', 'Razón Social actualizada exitosamente.');
    }

    public function destroy(RazonSocial $razonSocial)
    {
        $razonSocial->delete();

        return redirect()->route('razon_social.index')->with('success', 'Razón Social eliminada exitosamente.');
    }
}
