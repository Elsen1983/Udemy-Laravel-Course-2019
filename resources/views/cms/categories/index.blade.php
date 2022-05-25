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
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <a href='{{ route("categories.create")}}' class="btn btn-success"> Add New Category</a>
                </div>
            </div>
        </div>
    </div>
@endsection
