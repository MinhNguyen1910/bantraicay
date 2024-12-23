@extends('manager.manager') @section('main')

<div class="jumbotron">
    <div class="container">
        <h1>Hello, {{ auth()->user()->name }}!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>

@stop
