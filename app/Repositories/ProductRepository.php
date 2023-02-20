<?php

namespace App\Repositories;

use DB;
use Illuminate\Support\Collection;

class ProductRepository
{
    public function search(string $str): Collection
    {
        return DB::table('products')
            ->select('products.name as name', 'categories.name as category', DB::raw("'product' as type"))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.name', 'like', '%' . $str . '%')
            ->orWhere('categories.name', 'like', '%' . $str . '%')
            ->union(
                DB::table('categories')
                    ->select('name', DB::raw('"" as category'), DB::raw("'category' as type"))
                    ->where('name', 'like', '%' . $str . '%')
            )
            ->orderBy('name')
            ->get()
            ->shuffle();
    }
}
