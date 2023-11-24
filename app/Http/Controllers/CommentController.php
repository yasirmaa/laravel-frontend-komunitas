<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $token = $request->cookie('token');

        $data = [
            'product_id' => $request->product_id,
            'content' => $request->content
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://laravel-api-uas.test/api/comments', $data);

        return redirect('/products/' . $request->product_id);
    }
}
