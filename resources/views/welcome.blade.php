@extends('layouts.app')

@section('title')
    Laravel Tutorial
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center justify-content-center">
                <h1>Welcome page</h1>
                <br>
                <h3>
                    <a href="/todo">ToDo page</a>
                </h3>
                <h3>
                    <a href="/about">About page</a>
                </h3>
                <h3>
                    <a href="/contact">Contact page</a>
                </h3>
            </div>
        </div>
    </div>

@endsection
