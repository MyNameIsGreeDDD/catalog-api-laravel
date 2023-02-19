<?php

namespace App\Repositories;

use App\Models\Category;
use DB;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function getPopularCategories(): Collection
    {
        return Category::select(DB::raw('categories.id, categories.name, count(reviews.id) as review_count'))
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->groupBy('categories.id')
            ->orderBy('review_count', 'desc')
            ->limit(5)
            ->get();
    }
}
