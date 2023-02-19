@extends('layouts.admin')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя продукта</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>
                    <a class="btn btn-xs btn-info" href="{{ route('admin.reviews.create',[$product]) }}"
                       target="_blank">
                        Добавить отзыв
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

