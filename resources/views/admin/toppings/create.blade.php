@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add new Topping
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
            <form method="POST" action="{{ route('admin.toppings.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="pieSize" class="col-md-4 col-form-label text-md-right">{{ __('Pie size') }}</label>

                    <div class="col-md-6">
                      <select name="pieSize">
                          <option value="13.5">13.5</option>
                          <option value="11.5">11.5</option>
                          <option value="9.5">9.5</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="weightPerPieGm" class="col-md-4 col-form-label text-md-right">{{ __('Weight Per Pie (Grams)') }}</label>

                    <div class="col-md-6">
                        <input id="weightPerPieGm" type="float" class="form-control @error('weightPerPieGm') is-invalid @enderror" name="weightPerPieGm" value="{{ old('weightPerPieGm') }}" required autocomplete="weightPerPieGm">

                        @error('weightPerPieGm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price (€)') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="float" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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
