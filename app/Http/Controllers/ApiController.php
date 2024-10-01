<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Reset()
    {
        return redirect()->route('api');
    }
    public function index()
    {
        $products = Http::get("https://fakestoreapi.com/products")->json();
        return view('api.index', compact('products'));
    }
    public function singleProduct($slug, $id)
    {
        $product = Http::get("https://fakestoreapi.com/products/$id")->json();
        return view('api.product', compact('product'));
    }
    public function limitProduct(Request $request)
    {

        $limit = $request->limit;
        $products = Http::get("https://fakestoreapi.com/products?limit=$limit")->json();
        return view('api.index', compact('products'));
    }
    public function desc()
    {
        $products = Http::get("https://fakestoreapi.com/products?sort=desc")->json();
        return view('api.index', compact('products'));
    }
    public function asc()
    {
        $products = Http::get("https://fakestoreapi.com/products?sort=asc")->json();
        return view('api.index', compact('products'));
    }
    public function categoryProduct($category){
        $products = Http::get("https://fakestoreapi.com/products/category/$category")->json();
        return view('api.index', compact('products'));
    }

}
