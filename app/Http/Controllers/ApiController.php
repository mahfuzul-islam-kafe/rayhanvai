<?php

namespace App\Http\Controllers;

use App\Services\Api\ProductApi;
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
        $products = ProductApi::getProducts();
        return view('api.index', compact('products'));
    }
    public function singleProduct($slug, $id)
    {
        $product = ProductApi::getSingleProducts($id);
        return view('api.product', compact('product'));
    }
    public function limitProduct(Request $request)
    {

        $limit = $request->limit;
        $products = ProductApi::getProductslimit($limit);
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
        $products = ProductApi::getProductsCategory($category);
        return view('api.index', compact('products'));
    }

}
