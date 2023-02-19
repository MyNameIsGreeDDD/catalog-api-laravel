@extends('layouts.admin')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <a href="{{ route('admin.favorite.store', [$product->id,142]) }}" class="btn btn-primary">Добавить в избранное</a>
                        <a href="{{ route('admin.reviews.create',[$product]) }}" class="btn btn-primary">Добавить отзыв</a>
                    </div>
                </div>
            </div>
    </div>
@endsection
