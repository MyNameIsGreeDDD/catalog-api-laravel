<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\UploadedFile;

class ReviewController extends BaseApiController
{
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

        return $this->success([]);
    }
}
