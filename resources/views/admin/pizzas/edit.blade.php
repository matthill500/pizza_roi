@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Pizza
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
          <form method="POST" action="{{route('admin.pizzas.update', $pizza->id)}}" enctype="multipart/form-data">

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

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">Image</label>
                  <div class="custom-file col-md-6">
              <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
              <label class="custom-file-label" for="image">Pizza Image</label>
            </div>
          </div>


            <div class="form-group" style="margin-bottom:-0.2em;">

              New Toppings:<br>
              <div style="margin-left:9em;">
                Add
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square " style="color:green" onclick="addNewList()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
               </svg>
               Remove
               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-square " style="color:red" onclick="removeNewList()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
              </svg>
            </div>
              <div class="col-md-6 list">
                <?php $count = 0; ?>
                @foreach ($pizza->toppings as $pTopping)
                <div class="count<?php echo $count ?>">
               <label for="topping" class="col-md-4 col-form-label text-md-right" style="margin-bottom:0.2em;">Topping</label>
               <select name="topping_id[<?php echo $count ?>]">
                 @foreach ($toppings as $topping)
                   <option value="{{$topping->id}}" {{ ($pTopping->name == $topping->name) ? 'selected' : '' }}>
                     {{$topping->name}}
                   </option>
                   @endforeach
               </select>
               <br>
             </div>
               <?php $count++; ?>
               @endforeach
              </div>
            </div>

            <div class="form-group listRow" style="margin-left:-9em;"></div>

            <a href="{{route('admin.pizzas.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
var count = <?php echo $count; ?>;
function addNewList(){
var newElems = $('<div class="count'+count+'"><label for="topping" class="col-md-4 col-form-label text-md-right" style="margin-bottom:0.2em;">Topping</label><select name="topping_id['+count+']"> @foreach ($toppings as $topping)<option value="{{$topping->id}}">{{$topping->name}}</option>@endforeach</select></br></div>');
$('.listRow').append(newElems);
count++;

}

function removeNewList(){
  count--;
  console.log(count);
  $(".count"+count).remove();
}
// var count = 0;
// function addNewList(){
//   count++;
//
//    $(".list").clone().removeClass('list').addClass('newClass'+count).appendTo(".listRow");
//    $(".newClass"+count).children("select").attr("name", "topping_id["+count+"]");
// }
// function removeNewList(){
//   $(".newClass"+count).remove();
//   count--;
// }
</script>
@endsection
