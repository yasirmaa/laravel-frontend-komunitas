<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;
        return view('products.index', compact('categories'));
    }
}
