@extends('layouts.app')

@section('body')
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Placa</th>
            <th scope="col">Marca</th>
            <th scope="col">Propietario</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>
                    @if($vehicle->brand_id == 1)
                        {{$vehicle->plate}}
                        <span class="badge badge-pill badge-success">Los de Mazda son los mejores</span>
                    @elseif($vehicle->brand_id === 3)
                        <b style="color: red">{{$vehicle->plate}}</b>
                    @else
                        {{$vehicle->plate}}
                    @endif
                </td>

                <td>{{$vehicle->brand->name}}</td>
                <td>{{$vehicle->people->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection