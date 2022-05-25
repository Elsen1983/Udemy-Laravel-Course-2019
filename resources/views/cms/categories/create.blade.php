@extends('layouts.app')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">{{ __('Create Category') }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                        <div class="card-header">{{ __('Add New Category') }}</div>
                    <div class="card-body">
                        <form action=' {{ route("categories.store") }}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="category_name" name="name">
                            </div>
                            <div class="form-group">
                                <div class="my-2">
                                    <button class="btn btn-success">{{ __('Add Category') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
