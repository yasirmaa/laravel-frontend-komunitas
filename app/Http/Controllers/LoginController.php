<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Panggil endpoint eksternal untuk mendapatkan token setelah otentikasi berhasil
            $dataValid = json_decode(Http::post('http://laravel-api-uas.test/api/login', $credentials));
            $token = $dataValid->data->token;

            // Pastikan token diperoleh dari respons yang sesuai
            if (isset($token)) {
                $cookie = cookie('token', $token, 60 * 24);
                return redirect()->intended('/')->withCookie($cookie);
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Cookie::queue(Cookie::forget('token'));
        return redirect('/');
    }
}
