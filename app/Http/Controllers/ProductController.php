<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', [
            'products' => $products
        ]);
    }

    public function show($shop)
    {
        $shop = Product::findOrFail($shop);
        return view('shop.show', [
            'product' => $shop
        ]);
    }
}
