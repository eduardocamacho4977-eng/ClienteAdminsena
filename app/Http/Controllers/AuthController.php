<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra el formulario de Login
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate que tu vista esté en resources/views/auth/login.blade.php
    }

    // Procesa el inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Bienvenido al sistema');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Muestra el formulario de Registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesa la creación de un nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registro completado e inicio de sesión exitoso.');
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}