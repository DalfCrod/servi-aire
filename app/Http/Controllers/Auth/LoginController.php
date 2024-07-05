<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nroIdentificacion', 'contraseña');

        if (Auth::attempt(['nroIdentificacion' => $credentials['nroIdentificacion'], 'password' => $credentials['contraseña']])) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nroIdentificacion' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
