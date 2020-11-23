@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add new Pizza
          <button class="btn btn-danger float-right" onclick="removeNewList()" style="margin-left:0.5em;">
            Remove topping option
          </button>
          <button class="btn btn-success float-right" onclick="addNewList()">
            Add topping option
          </button>

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
            <form method="POST" action="{{ route('admin.pizzas.store') }}">
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
                    <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

                    <div class="col-md-6">
                      <select name="size">
                          <option value="13.5">13.5</option>
                          <option value="11.5">11.5</option>
                          <option value="9.5">9.5</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="retailPrice" class="col-md-4 col-form-label text-md-right">{{ __('Retail Price') }}</label>

                    <div class="col-md-6">
                        <input id="retailPrice" type="float" class="form-control @error('retailPrice') is-invalid @enderror" name="retailPrice" value="{{ old('retailPrice') }}" required autocomplete="retailPrice">

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
                        <input id="wholesalePrice" type="float" class="form-control @error('wholesalePrice') is-invalid @enderror" name="wholesalePrice" value="{{ old('wholesalePrice') }}" required autocomplete="wholesalePrice">

                        @error('wholesalePrice')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 list">
                   <label for="topping" class="col-md-4 col-form-label text-md-right" style="margin-left:11.8em; margin-bottom:0.2em;">Topping</label>
                   <select name="topping_id[0]">
                     @foreach($toppings as $topping)
                       <option value="{{$topping->id}}">
                         {{$topping->name}}
                       </option>
                     @endforeach
                   </select>
                  </div>
                </div>

                <div class="form-group listRow"></div>

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

  <script>
  var count = 0;
  function addNewList(){
    count++;
    $(".list").clone().removeClass('list').addClass('newClass'+count).appendTo(".listRow");
    $(".newClass"+count).children("select").attr("name", "topping_id["+count+"]");
  }
  function removeNewList(){
    $(".newClass"+count).remove();
    count--;
  }
  </script>

@endsection
