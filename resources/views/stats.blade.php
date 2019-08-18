@extends('layouts.app')

@section('body')
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Cantidad</th>
            <th scope="col">Marca</th>
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