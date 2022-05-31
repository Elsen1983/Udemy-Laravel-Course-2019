@extends('layouts.app')

@section('title')
    {{ isset($category) ? 'Edit Category' : 'Create Category' }}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">{{ isset($category) ? 'Edit Category ( ' . $category->name . ' )' : __('Create Category') }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                        <div class="card-header">{{ isset($category) ? __('Edit Category') : __('Create New Category') }}</div>
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action=' {{ isset($category) ? route("categories.update", $category) : route("categories.store") }}'
                                method="POST">
                            @csrf
                            <!-- IMPORTANT TO USE THE WAY BELOW FOR CHANGE THE TYPE OF THE METHOD OF THE FORM INSTEAD USE INLINE CODE LIKE FOR ACTION='' -->
                            @if(isset($category))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="category_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="category_name" name="name" value="{{ isset($category) ? __($category->name) : '' }}">
                            </div>
                            <div class="form-group">
                                <div class="my-2">
                                    <button type="submit" class="btn btn-success">{{ isset($category) ? __('Update Category') : __('Add Category') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
