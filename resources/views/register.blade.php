@extends('layouts.app')

@section('title')
    {{__('strings.register_vehicles')}}
@endsection

@section('body')
    <div class="title m-b-md m-t-md centered-text">
        {{__('strings.register')}}
    </div>

    <form method="post" action="{{route('store')}}">

        <div class="container mt-5">
            @csrf

            <div class="card">

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">{{__('strings.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="{{__('strings.name')}}"
                               value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id">{{__('strings.dni')}}</label>
                        <input type="number" class="form-control" id="id" name="id" placeholder="{{__('strings.dni')}}"
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
                        <label for="plate">{{__('strings.plate')}}</label>
                        <input type="text" class="form-control" id="plate" name="plate"
                               placeholder="{{__('strings.plate')}}"
                               value="{{old('plate')}}">
                        @error('plate')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="brand_id">{{__('strings.brand')}}</label>
                        <select class="form-control" id="brand_id" name="brand_id">
                            <option>{{__('strings.choose_brand')}}</option>
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
                <button type="submit" class="btn btn-primary">{{__('strings.action_register')}}</button>
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