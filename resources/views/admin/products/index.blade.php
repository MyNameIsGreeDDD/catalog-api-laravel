@extends('layouts.admin')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <a href="{{route('admin.products.show',[$product])}}" class="btn btn-primary">Посмотреть</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
