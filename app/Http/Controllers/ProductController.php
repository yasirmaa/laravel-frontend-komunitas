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
        $title = 'Produk';
        $slug = null;
        return view('products.index', compact('products', 'title', 'categories', 'slug'));
    }

    public function show($id)
    {
        $product = json_decode(Http::get('http://laravel-api-uas.test/api/products/' . $id));
        $product = $product->data;

        $title = 'Produk';
        return view('products.product', compact('product', 'title'));
    }

    public function showEdit($id)
    {
        $product = json_decode(Http::get('http://laravel-api-uas.test/api/products/' . $id));
        $product = $product->data;

        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;

        $title = 'Jual';
        return view('jual.edit-product', compact('product', 'title', 'categories'));
    }

    public function showByUser($username)
    {
        $products = json_decode(Http::get('http://laravel-api-uas.test/api/jual/' . $username));
        $products = $products->data;

        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;

        $title = 'Jual';
        return view('jual.index', compact('products', 'title', 'categories'));
    }

    public function showByCategory($slug)
    {
        $products = json_decode(Http::get('http://laravel-api-uas.test/api/category/' . $slug));
        $products = $products->data;

        $categories = json_decode(Http::get('http://laravel-api-uas.test/api/categories'));
        $categories = $categories->data;

        $title = 'Produk';
        return view('products.index', compact('products', 'title', 'categories', 'slug'));
    }

    public function store(Request $request)
    {
        $token = $request->cookie('token');

        $file = request('image');
        $file_path = $file->getPathName();
        $file_mime = $file->getMimeType('image');
        $file_uploaded_name = $file->getClientOriginalName();

        $url = 'http://laravel-api-uas.test/api/products';

        $client = new Client();

        $response = $client->request("POST", $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => $file_uploaded_name,
                    'Mime-Type' => $file_mime,
                    'contents' => fopen($file_path, 'r')
                ],
                [
                    'name' => 'name',
                    'contents' => $request->name
                ],
                [
                    'name' => 'stock',
                    'contents' => $request->stock
                ],
                [
                    'name' => 'price',
                    'contents' => $request->price
                ],
                [
                    'name' => 'description',
                    'contents' => $request->description
                ],
                [
                    'name' => 'category_id',
                    'contents' => $request->category_id
                ],
                [
                    'name' => 'condition',
                    'contents' => $request->condition
                ],
            ]
        ]);

        $responseData = json_decode($response->getBody(), true);

        return back()->with('successProduct', 'Berhasil Menambahkan Produk!');
    }

    public function destroy(Request $request, int $id)
    {
        $token = $request->cookie('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete('http://laravel-api-uas.test/api/products/' . $id);

        return back()->with('deleteSuccess', 'Berhasil Menghapus!');
    }

    public function update(Request $request, $id)
    {
        $token = $request->cookie('token');
        $data = $request;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->patch('http://laravel-api-uas.test/api/products/' . $id, $data);

        return back()->with('successEdit', 'Berhasil Mengedit Produk!');
    }
}
