<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $username = null;
        if (Auth::check()) {
            $username = Auth::user()->name;
        }
        return view('home', ['products' => $products, 'username' => $username]);
    }
}