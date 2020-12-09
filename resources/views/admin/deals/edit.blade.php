@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Deal
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
          <form method="POST" action="{{route('admin.deals.update', $deal->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name', $deal->name)}}" />
            </div>

            <div class="form-group">
              <label for="retailPrice">Retail Price</label>
              <input type="float" class="form-control" id="retailPrice" name="retailPrice" value="{{old('retailPrice', $deal->retailPrice)}}" />
            </div>


            <div class="form-group col-md-6 float-left" style="margin-bottom:-0.2em;">
              <div>
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
                @foreach ($deal->pizzas as $dPizza)
                <div class="count<?php echo $count ?>">
               <label for="pizza" class=" col-form-label text-md-right" style="margin-bottom:0.2em;"></label>
               <select name="pizza_id[<?php echo $count ?>]">
                 @foreach ($pizzas as $pizza)
                   <option value="{{$pizza->id}}" {{ ($dPizza->name == $pizza->name) ? 'selected' : '' }}>
                     {{$pizza->name}}
                   </option>
                   @endforeach
               </select>
               <br>
             </div>
               <?php $count++; ?>
               @endforeach
              </div>
          </div>

          <div class="form-group col-md-6 float-left" style="margin-bottom:-0.2em;">
            <div>
              Add
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square " style="color:green" onclick="addNewList2()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
             </svg>
             Remove
             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-square " style="color:red" onclick="removeNewList2()" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
            </svg>
          </div>
            <div class="col-md-6 list2">
              <?php $count2 = 0; ?>
              @foreach ($deal->sides as $dSide)
              <div class="count2<?php echo $count2 ?>">
             <label for="side" class=" col-form-label text-md-right"></label>
             <select name="side_id[<?php echo $count2 ?>]">
               @foreach ($sides as $side)
                 <option value="{{$side->id}}" {{ ($dSide->name == $side->name) ? 'selected' : '' }}>
                   {{$side->name}}
                 </option>
                 @endforeach
             </select>
             <br>
           </div>
             <?php $count2++; ?>
             @endforeach
            </div>
        </div>
            <div class="form-group listRow col-md-6 float-left"></div>
            <div class="form-group listRow2 col-md-6 float-left"></div>

            </div>
            <div class="row">
              <div class="col-8" style="text-align:center;">
                <a href="{{route('admin.deals.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
var count = <?php echo $count; ?>;
function addNewList(){
var newElems = $('<div class="count'+count+'" style="margin-left:1em;"><label for="pizza" class="col col-form-label text-md-right" style="margin-bottom:0.2em;"></label><select name="pizza_id['+count+']"> @foreach ($pizzas as $pizza)<option value="{{$pizza->id}}">{{$pizza->name}}</option>@endforeach</select></br></div>');
$('.listRow').append(newElems);
count++;

}
function removeNewList(){
  count--;
  console.log(count);
  $(".count"+count).remove();
}

var count2 = <?php echo $count2; ?>;
function addNewList2(){
var newElems = $('<div class="count'+count2+'" style="margin-left:1em;"><label for="side" class="col col-form-label text-md-right" style="margin-bottom:0.2em;"></label><select name="side_id['+count2+']"> @foreach ($sides as $side)<option value="{{$side->id}}">{{$side->name}}</option>@endforeach</select></br></div>');
$('.listRow2').append(newElems);
count2++;

}
function removeNewList2(){
  count2--;
  $(".count2"+count2).remove();
}
</script>
@endsection
