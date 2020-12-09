@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add new Side
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
            <form method="POST" action="{{ route('admin.sides.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('Name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="retailPrice" class="col-md-4 col-form-label text-md-right">{{ __('Retail Price') }}</label>

                    <div class="col-md-6">
                        <input id="retailPrice" type="float" class="form-control @error('retailPrice') is-invalid @enderror" name="retailPrice" value="{{ old('retailPrice') }}" required autocomplete="retailPrice" autofocus>

                        @error('retailPrice')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="wholesalePrice" class="col-md-4 col-form-label text-md-right">{{ __('Wholesale Price') }}</label>

                    <div class="col-md-6">
                        <input id="wholesalePrice" type="float" class="form-control @error('wholesalePrice') is-invalid @enderror" name="wholesalePrice" value="{{ old('wholesalePrice') }}" required autocomplete="wholesalePrice" autofocus>

                        @error('wholesalePrice')
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
