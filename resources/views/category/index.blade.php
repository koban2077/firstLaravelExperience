@extends('base')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <h1>Categories list</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
