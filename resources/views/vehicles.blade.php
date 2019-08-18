@extends('layouts.app')

@section('title')
    {{__('strings.listing_vehicles')}}
@endsection

@section('body')
    <div class="title m-b-md m-t-md centered-text">
        {{__('strings.listing_vehicles')}}
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">{{__('strings.plate')}}</th>
            <th scope="col">{{__('strings.brand')}}</th>
            <th scope="col">{{__('strings.owner')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>
                    @if($vehicle->brand_id == 1)
                        {{$vehicle->plate}}
                        <span class="badge badge-pill badge-success">{{__('strings.mazda_stuff')}}</span>
                    @elseif($vehicle->brand_id === 3)
                        <b style="color: red">{{$vehicle->plate}}</b>
                    @else
                        {{$vehicle->plate}}
                    @endif
                </td>

                <td>
                    <span class="badge badge-pill badge-secondary">{{$vehicle->brand->name}}</span>
                </td>
                <td>{{$vehicle->people->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection