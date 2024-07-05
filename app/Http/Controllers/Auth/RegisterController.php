<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RazonSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombreCompleto' => 'required|string|max:255',
            'tipoPersona' => 'required|integer',
            'nroIdentificacion' => 'required|string|max:255|unique:RazonSocial',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:RazonSocial',
            'direccion' => 'required|string|max:255',
            'rol' => 'required|integer',
            'contraseña' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = RazonSocial::create([
            'nombreCompleto' => $validatedData['nombreCompleto'],
            'tipoPersona' => $validatedData['tipoPersona'],
            'nroIdentificacion' => $validatedData['nroIdentificacion'],
            'telefono' => $validatedData['telefono'],
            'email' => $validatedData['email'],
            'direccion' => $validatedData['direccion'],
            'rol' => $validatedData['rol'],
            'contraseña' => Hash::make($validatedData['contraseña']),
        ]);

        // Iniciar sesión automáticamente al usuario registrado
        Auth::login($user);

        // Redirigir al dashboard o a la página que desees
        return redirect()->route('dashboard');
    }
}
