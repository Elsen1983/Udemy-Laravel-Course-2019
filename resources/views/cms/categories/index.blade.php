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
                                        <!-- <a href='{{ route("categories.destroy", $category) }}' class="btn btn-danger">Delete</a> -->
                                        <button class="btn btn-danger" onclick="handleDelete( {{ $category }}, 'deleteCategoryModal')">Delete</button>
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

        <!-- Modal -->
        <div class="modal fade" id="deleteCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="" method="POST" id="deleteCategoryForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong id="deleteCategoryName"></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

{{-- custom scripts --}}
@section('scripts')
<script>
</script>
@endsection


