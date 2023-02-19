<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class ProductService
{
    public function toggleFavorite(Product $product, User $user): string
    {
        $favorite = $user->favorites()->find($product);

        if ($favorite === null) {
            $user->favorites()->attach($product);

            return 'Товар добавлен в избранное';
        }

        $user->favorites()->detach($product);

        return 'Товар удален из избранного';
    }
}
