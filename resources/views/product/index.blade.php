@extends('base')

@section('title', 'Products List')

@section('content')
<div class="row">
        <h1>Products List</h1>
        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
