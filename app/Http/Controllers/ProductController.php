<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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

    public function addFavorite(Product $product, User $user)
    {
        $user->favorites()->save($product);

        return redirect()->route('admin.products.index');
    }
}
