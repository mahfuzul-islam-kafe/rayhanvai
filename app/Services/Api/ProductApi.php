<?php

namespace App\Services\Api;
use Http;

class ProductApi
{

    public static function getProducts()
    {
        $products = Http::get("https://fakestoreapi.com/products")->json();
        return $products;
    }
    public static function getSingleProducts($id)
    {
        $products = Http::get("https://fakestoreapi.com/products/$id")->json();
        return $products;
    }
    public static function getProductslimit($limit)
    {
        $products = Http::get("https://fakestoreapi.com/products?limit=$limit")->json();
        return $products;
    }
    public static function getProductsCategory($category)
    {
        $products = Http::get("https://fakestoreapi.com/products/category/$category")->json();
        return $products;
    }
}