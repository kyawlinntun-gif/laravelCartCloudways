<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function addToCart(Product $product)
    {
        $cartItems = Session::get('cartItems', []);

        if (isset($cartItems[$product->id])) {
            $cartItems[$product->id]['quantity']++;
        } else {
            $cartItems[$product->id] = [
                'name' => $product->name,
                'details' => $product->details,
                'price' => $product->price,
                'brand' => $product->brand,
                'image_path' => $product->image_path,
                'quantity' => 1
            ];
        }

        Session::put('cartItems', $cartItems);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeToCart(Product $product)
    {
        if ($product->id) {
            $cartItems = Session::get('cartItems');

            if (isset($cartItems[$product->id])) {
                unset($cartItems[$product->id]);
                Session::put('cartItems', $cartItems);
            }
        }

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function updateToCart(Product $product, Request $request)
    {
        if ($product->id) {
            $cartItems = Session::get('cartItems');

            if (isset($cartItems[$product->id])) {
                $cartItems[$product->id]['quantity'] = $request->quantity;
            }
        }

        Session::put('cartItems', $cartItems);

        return redirect()->back()->with('success', 'Product updated to cart!');
    }
}
