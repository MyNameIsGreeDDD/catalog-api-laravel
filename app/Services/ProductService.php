<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use App\Repositories\ProductRepository;
use Illuminate\Support\Collection;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

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

    public function search(string $str): Collection
    {
        return $this->productRepository->search($str);
    }
}
