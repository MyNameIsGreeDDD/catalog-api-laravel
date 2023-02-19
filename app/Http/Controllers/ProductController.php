<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function addFavorite(Product $product, User $user)
    {
        $user->favorites()->save($product);

        return redirect()->route('admin.products.index');
    }
}
