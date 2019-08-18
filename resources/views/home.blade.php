@extends('layouts.app')

@section('title')
    {{__('strings.home')}}
@endsection

@section('body')
    <div class="content">
        <div class="title m-b-md">
            {{__('strings.app_name')}}
        </div>

        <div class="links">
            <a href="{{route('register')}}">{{__('strings.register_vehicles')}}</a>
            <a href="{{route('vehicles')}}">{{__('strings.list_vehicles')}}</a>
            <a href="{{route('stats')}}">{{__('strings.statistics_vehicles')}}</a>
        </div>
    </div>
@endsection