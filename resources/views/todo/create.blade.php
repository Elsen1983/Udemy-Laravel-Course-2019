@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Create Todo</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Create New Todo
                    </div>
                    <div class="card-body">
                        <form action="/save-todo" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group py-2">
                                <textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group py-2">
                                <button type="submit" class="btn btn-success">Add Todo</button>
                            </div>
                        </form>
                    </div>

                </div>
                <br>
                <h5 class=""><a href="/">Landing Page</a></h5>
            </div>
        </div>
    </div>

@endsection
