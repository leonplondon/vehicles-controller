@extends('layouts.app')

@section('body')
    <form method="post" action="{{route('store')}}">

        <div class="container mt-5">
            @csrf

            <div class="card">

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                               value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id">Cedula</label>
                        <input type="number" class="form-control" id="id" name="id" placeholder="Cedula"
                               value="{{old('id')}}">
                        @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>

            <br>

            <div class="card">

                <div class="card-body">

                    <div class="form-group">
                        <label for="plate">Placa</label>
                        <input type="text" class="form-control" id="plate" name="plate" placeholder="Placa"
                               value="{{old('plate')}}">
                        @error('plate')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="brand_id">Marca</label>
                        <select class="form-control" id="brand_id" name="brand_id">
                            <option>Selecciona la marca</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if (old('brand_id') == $brand->id) selected @endif>
                                    {{$brand->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                </div>

            </div>

            <br>

            <div class="content">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </div>

        <br>
        @if(session('message'))
            @if(session('success') == true)
                <div class="alert alert-success content"> {{session('message')}}</div>
            @else ()
                <div class="alert alert-danger content"> {{session('message')}}</div>
            @endif
        @endif

    </form>

@endsection