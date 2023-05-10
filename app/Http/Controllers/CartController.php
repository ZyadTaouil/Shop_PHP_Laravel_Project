<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user_id = Auth::user()->id;
        $cartItems = Cart::where('user_id', $user_id)->get();
        $products = Product::all();
        $totalPrice = 0;
        $i = 1;

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            $totalPrice += $product->price * $item->quantity;
            $item->number = $i++;
            $item->name = $product->title;
            $item->price = $product->price * $item->quantity;
        }

        return view('cart', ['cartItems' => $cartItems, 'products' => $products, 'user_id' => $user_id, 'totalPrice' => $totalPrice]);
    }

    public function remove($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $cartItem = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($cartItem) {
            $product = Product::find($id);
            $cartItem->delete();
            return redirect('/cart')->with('success', "Removed {$product->title} x {$cartItem->quantity} from cart");
        }
        return redirect('/cart')->with('danger', 'Product not found in cart');
    }

    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $product = Product::find($id);
        $user_id = Auth::user()->id;
        if (!$user_id) {
            return redirect('/login');
        }

        if (!$product) {
            return abort(404);
        }

        $quantity = intval($request->input('quantity'));

        if ($quantity < 1) {
            return redirect('/')->with('danger', "Invalid quantity for {$product->title}");
        }

        $cartItem = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'product_id' => $id,
                'user_id' => $user_id,
                'quantity' => $quantity
            ]);
        }

        return redirect('/cart')->with('success', "Added {$product->title} x {$quantity} to cart");
    }
}