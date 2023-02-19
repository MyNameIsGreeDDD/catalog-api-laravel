<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseApiController
{
    public function index(): JsonResponse
    {
        $products = Product::with('category')->paginate();

        return $this->success(new ProductCollection($products));
    }
}
