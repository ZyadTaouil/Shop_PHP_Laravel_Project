<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // Make sure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('checkout');
    }

    public function submit(Request $request)
    {
        // Make sure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string'
        ]);

        // Create a new order with the form data
        $order = new Order([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'notes' => $request->input('notes')
        ]);

        // Save the order to the database
        $order->save();

        // Clear the cart items from the session
        Session::forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully.');
    }

    public function success()
    {
        // Make sure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('checkout-success');
    }
}