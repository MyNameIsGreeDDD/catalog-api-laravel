<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\CategoryCollection;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseApiController
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function popularCategories(): JsonResponse
    {
        $categories = $this->categoryService->getPopularCategories();

        return $this->success(new CategoryCollection($categories));
    }
}
