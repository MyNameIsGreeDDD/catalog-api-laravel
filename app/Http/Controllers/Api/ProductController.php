<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseApiController
{

    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $products = Product::with('category')->paginate();

        return $this->success(new ProductCollection($products));
    }

    public function updateFavorite(Product $product, User $user): JsonResponse
    {
        return $this->success($this->productService->toggleFavorite($product, $user));
    }
}
