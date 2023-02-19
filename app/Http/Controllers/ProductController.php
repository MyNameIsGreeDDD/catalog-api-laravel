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

    public function show(Product $product): Factory|View|Application
    {
        return view('admin.products.show', compact('product'));
    }

}
