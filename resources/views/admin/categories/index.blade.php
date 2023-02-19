@extends('layouts.admin')
<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
    </tr>
    </thead>
    <tbody>

    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
