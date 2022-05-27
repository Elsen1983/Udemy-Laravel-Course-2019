@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Categories</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{ __('Categories') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="py-2">{{ $category->name }}</span>
                                    <div id="category_btns">
                                        <a href='{{ route("categories.edit", $category) }}' class="btn btn-primary">Edit</a>
                                        <a href='{{ route("categories.destroy", $category) }}' class="btn btn-danger">Delete</a>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-start mt-2">
                            <a href='{{ route("categories.create")}}' class="btn btn-success"> Add New Category</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
