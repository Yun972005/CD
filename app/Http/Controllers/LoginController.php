<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('login', 'password');

        if (Auth::attempt($credenciales)) {
            // Autenticación exitosa
            return redirect()->intended(route('posts.index'));
        } else {
            return back()->withErrors([
                'login' => 'Les credencials proporcionades no són correctes.',
            ])->onlyInput('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('inici');
    }
}
