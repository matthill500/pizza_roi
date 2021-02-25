@extends('layouts.appShop')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <form method="POST" action="{{ route('shop.stock.store') }}">
        <div class="card-header">
          Insert Stock
          <div class="float-right">
            <label for="start">Date:</label>
            <input 
            type="date" 
            id="stock-date" 
            name="stock-date"
            >
            </div>
        </div>

        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
              <ul>
              </div>
            @endif
            
                @csrf
            

                @foreach($stocks as $stock)
                @if(count($stock->topping)>0)
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{$stock->topping->first()->name}}</label>
                    <div class="col-md-6">
                        <input id="{{$stock->topping->first()->name}}" type="number" class="form-control @error('{{$stock->topping->first()->name}}') is-invalid @enderror" name="{{$stock->topping->first()->name}}" required autocomplete="{{$stock->topping->first()->name}}" autofocus>
                        @error('{{$stock->topping->first()->name}}')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{$stock->side->name}}</label>
                    <div class="col-md-6">
                        <input id="{{$stock->side->name}}" type="number" class="form-control @error('{{$stock->side->name}}') is-invalid @enderror" name="{{$stock->side->name}}" required autocomplete="{{$stock->side->name}}" autofocus>
                        @error('{{$stock->side->name}}')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @endif
                @endforeach
               

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection