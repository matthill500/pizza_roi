@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add a new Deal
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
            <form method="POST" action="{{ route('admin.deals.store') }}">
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
                <div class="form-group col-md-6 float-left" style="margin-bottom:-0.2em;">
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
                     <label for="pizza" class="col-md-4 col-form-label text-md-right" style=""></label>
                     <select name="pizza_id[0]" style="margin-left:13.5em;">
                        <option value="pizzas" selected disabled>Pizzas</option>
                       @foreach($pizzas as $pizza)
                         <option value="{{$pizza->id}}">
                           {{$pizza->name}}
                         </option>
                       @endforeach
                     </select>
                    </div>
                </div>

                <div class="form-group col-md-6 float-left">
                    <div class="col-md-6" style="margin-top:0.5em; text-align:center; margin-left:10.1em;">
                      Add
                      <svg width="1em" height="1em" viewBox="0 0 16 16" style="color:green" class="bi bi-plus-square"  onclick="addNewList2()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                     </svg>
                     Remove
                     <svg width="1em" height="1em" viewBox="0 0 16 16" style="color:red" class="bi bi-dash-square" onclick="removeNewList2()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                      <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                    </svg>
                   </div>
                    <div class="col-md-6 list2">
                     <label for="side" class="col-md-4 col-form-label text-md-right" style=" margin-bottom:0.2em;"></label>
                     <select name="side_id[0]"style="margin-left:13.5em;">
                       <option value="sides" selected disabled>Sides</option>
                       @foreach($sides as $side)
                         <option value="{{$side->id}}">
                           {{$side->name}}
                         </option>
                       @endforeach
                     </select>
                    </div>
                </div>

                <div class="form-group col-md-6 listRow float-left"></div>
                <div class="form-group col-md-6 listRow2 float-left"></div>

                  </div>

                  <div class="row">
                    <div class="col-md-12" style="text-align:center;">
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

  <script>
  var count = 0;
  function addNewList(){
    count++;
    $(".list").clone().removeClass('list').addClass('newClass'+count).appendTo(".listRow");
    $(".newClass"+count).children("select").attr("name", "pizza_id["+count+"]");
  }
  function removeNewList(){
    $(".newClass"+count).remove();
    count--;
  }


  var count2 = 0;
  function addNewList2(){
    count2++;
    $(".list2").clone().removeClass('list2').addClass('newClass'+count2).appendTo(".listRow2");
    $(".newClass"+count2).children("select").attr("name", "side_id["+count2+"]");
  }
  function removeNewList2(){
    $(".newClass"+count2).remove();
    count2--;
  }
  </script>

@endsection
