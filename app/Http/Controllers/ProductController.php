<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $products = json_decode(Http::get('http://laravel-api-uas.test/api/products'));
        $products = $products->data;
        $title = 'home';
        return view('home', compact('products', 'title'));
    }
}
