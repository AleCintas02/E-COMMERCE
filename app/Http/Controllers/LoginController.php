<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'user' => ['string', 'max:20', Rule::unique('users', 'user')],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'correo')],
            'password' => 'required|string|min:8|confirmed',
        ]);


        if ($validator->fails()) {
            return redirect(route('register'))->withErrors($validator)->withInput();
        }

        $user = User::create([
            //'user' => $request->user,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
        ]);
        

        Auth::login($user);
        return redirect(route('home'));
    }


    public function login(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $credentials = $request->only('correo', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Inicio de sesión exitoso.');
        }

        $user = User::where('correo', $request->correo)->first();

        if (!$user) {
            return back()->withErrors(['correo' => 'El correo electrónico proporcionado no está registrado.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'La contraseña proporcionada es incorrecta.']);
        }

        return back()->withErrors(['correo' => 'Las credenciales proporcionadas no son válidas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect(route('home'));
    }
}
