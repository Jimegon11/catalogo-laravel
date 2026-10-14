<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the product catalogue home page.
     */
    public function index(): View
    {
        $products = Product::orderBy('is_featured', 'desc')
            ->orderBy('rating', 'desc')
            ->get();

        return view('home', compact('products'));
    }
}
