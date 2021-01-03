@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add new Pizza
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
            <form method="POST" action="{{ route('admin.pizzas.store') }}" enctype="multipart/form-data">
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

                <div class="form-group custom-file row">
                  <label for="address" class="col-md-4 col-form-label text-md-right">Image</label>
                  <div class="custom-file col-md-6">
                    <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
                    <label class="custom-file-label" for="image">Pizza Image</label>
                </div>
              </div>

                <div class="form-group" style="margin-bottom:-0.2em;">
                  <div class="col-md-6" style="margin-top:0.5em; text-align:center; margin-left:11em;">
                    Add
                    <svg width="1em" height="1em" viewBox="0 0 16 16" style="color:green" class="bi bi-plus-square"  onclick="addNewList()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                      <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                   </svg>
                   Remove
                   <svg width="1em" height="1em" viewBox="0 0 16 16" style="color:red" class="bi bi-dash-square" onclick="removeNewList()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                  </svg>
                 </div>
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
