@extends('layouts.app')

@section('title')
    {{__('strings.statistics_vehicles')}}
@endsection

@section('body')
    <div class="title m-b-md m-t-md centered-text">
        {{__('strings.statistics_vehicles')}}
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">{{__('strings.amount')}}</th>
            <th scope="col">{{__('strings.brand')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stats as $stat)
            <tr>
                <td>{{$stat->amount}}</td>
                <td>{{$stat->brand}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection