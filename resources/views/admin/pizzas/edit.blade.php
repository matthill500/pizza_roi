@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Pizza
          <button class="btn btn-danger float-right" onclick="removeNewList()" style="margin-left:0.5em;">
            Remove topping option
          </button>
          <button class="btn btn-success float-right" onclick="addNewList()">
            Add topping option
          </button>
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" action="{{route('admin.pizzas.update', $pizza->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name', $pizza->name)}}" />
            </div>

            <div class="form-group">
              <label for="shop">Size</label>
              <select name="size">
                @if ($pizza->size == 13.5)
                  <option value="13.5" selected="selected">13.5</option>
                  <option value="11.5">11.5</option>
                  <option value="9.5">9.5</option>
                @elseif ($pizza->size == 11.5)
                  <option value="13.5">13.5</option>
                  <option value="11.5" selected="selected">11.5</option>
                  <option value="9.5">9.5</option>
                @elseif ($pizza->size == 9.5)
                  <option value="13.5">13.5</option>
                    <option value="11.5">11.5</option>
                  <option value="9.5" selected="selected">9.5</option>
                @endif
              </select>
            </div>

            <div class="form-group">
              <label for="retailPrice">Retail Price</label>
              <input type="float" class="form-control" id="retailPrice" name="retailPrice" value="{{old('retailPrice', $pizza->retailPrice)}}" />
            </div>

            <div class="form-group">
              <label for="wholesalePrice">Wholesale Price</label>
              <input type="float" class="form-control" id="wholesalePrice" name="wholesalePrice" value="{{old('wholesalePrice', $pizza->wholesalePrice)}}" />
            </div>


            <div class="form-group">
              Current toppings: <br><h2>@foreach($pizza->toppings as $pTopping){{$pTopping->name}} @endforeach</h2>
              New Toppings:<br>
              <div class="col-md-6 list">
               <label for="topping" class="col-md-4 col-form-label text-md-right" style="margin-bottom:0.2em;">Topping</label>
               <select name="topping_id[0]">
                 @foreach ($toppings as $topping)
                   <option value="{{$topping->id}}">
                     {{$topping->name}}
                   </option>
                   @endforeach
               </select>
               <br>
              </div>
            </div>

            <div class="form-group listRow"></div>

            <a href="{{route('admin.pizzas.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

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
