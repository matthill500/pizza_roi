@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add new Area
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
            <form method="POST" action="{{ route('admin.areas.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                    <div class="col-md-6">
                        <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                   <label for="shop" class="col-md-4 col-form-label text-md-right" style="margin-left:11.8em;">Shop</label>
                   <select name="shop_id">
                     @foreach($shops as $shop)
                       <option value="{{$shop->id}}" {{ (old('shop_id') == $shop->id) ? 'selected' : '' }} >
                         {{$shop->name}}
                       </option>
                     @endforeach
                   </select>
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
