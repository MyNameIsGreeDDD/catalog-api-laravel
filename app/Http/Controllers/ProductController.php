<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = Product::paginate();

        return view('admin.products.index', compact('products'));
    }
}
