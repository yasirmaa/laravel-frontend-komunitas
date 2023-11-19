<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = json_decode(Http::get('http://laravel-api-uas.test/api/products'));
        $products = $products->data;

        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;

        $searchTerm = request('search');
        if ($searchTerm) {
            $filteredProducts = [];
            foreach ($products as $product) {
                if (stripos($product->name, $searchTerm) !== false) {
                    $filteredProducts[] = $product;
                }
            }
            $products = $filteredProducts;
        }
        $title = 'produk';
        $slug = null;
        return view('products.index', compact('products', 'title', 'categories', 'slug'));
    }

    public function show($id)
    {
        $product = json_decode(Http::get('http://laravel-api-uas.test/api/products/' . $id));
        $product = $product->data;

        $title = 'produk';
        return view('products.product', compact('product', 'title'));
    }

    public function showByCategory($slug)
    {
        $products = json_decode(Http::get('http://laravel-api-uas.test/api/category/' . $slug));
        $products = $products->data;

        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;

        $title = 'produk';
        return view('products.index', compact('products', 'title', 'categories', 'slug'));
    }
}
