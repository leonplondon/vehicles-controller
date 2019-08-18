@extends('layouts.app')

@section('body')
    <div class="content">
        <div class="title m-b-md">
            Vehicles controller
        </div>

        <div class="links">
            <a href="{{route('vehicles')}}">List vehicles</a>
            <a href="{{route('register')}}">Register vehicle</a>
            <a href="{{route('stats')}}">Stats</a>
        </div>
    </div>
@endsection