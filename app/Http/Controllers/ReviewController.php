<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\UploadedFile;

class ReviewController extends Controller
{
    public function create(Product $product): Factory|View|Application
    {
        return view('admin.reviews.create', compact('product'));
    }

    public function store(ReviewStoreRequest $request, Product $product)
    {
        $attributes = $request->only(['first_name', 'text']);
        $attributes['product_id'] = $product->id;

        $review = Review::create($attributes);

        if ($request->file('img') != null) {
            array_map(function (UploadedFile $file) use ($review) {
                $review->addMedia($file)->toMediaCollection('review_images', 'public');
            }, $request->file('img'));
        }

        return redirect()->route('admin.products.index');
    }
}
