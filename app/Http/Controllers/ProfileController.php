<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        $token = $request->cookie('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://laravel-api-uas.test/api/me');

        $data = json_decode($response->getBody(), true);
        $title = null;
        return view('profile.index', compact('data', 'title'));
    }

    public function showByUser(Request $request, $username)
    {
        $token = $request->cookie('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://laravel-api-uas.test/api/me');

        $data = json_decode($response->getBody(), true);
        $title = null;
        return view('profile.index', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $token = $request->cookie('token');

        $data = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email:dns',
            'no_phone' => 'required|min:2|max:255',
            'address' => 'required|min:2|max:255'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->patch('http://laravel-api-uas.test/api/profile/' . $id, $data);

        return back()->with('successEdit', 'Berhasil Mengedit Profile!');
    }
}
