@extends('layouts.app')

@section('title')
    Laravel Tutorial
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="text-center justify-content-center">
                        <h1>Welcome page</h1>
                        <br>
                        <h3>
                            <a href='{{ route("todo.index") }}'>
                                {{ __('ToDo Application (View ToDo List)') }}
                            </a>
                        </h3>
                        <h3>
                        <a href='{{ route("cms.index") }}'>
                                {{ __('CMS Application') }}
                            </a>
                        </h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
