@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Topping
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
          <form method="POST" action="{{route('admin.toppings.update', $topping->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name', $topping->name)}}" />
            </div>

            <div class="form-group">
              <label for="size">Pie size</label>
              <select name="pieSize">
                @if ($topping->pieSize == 13.5)
                  <option value="13.5" selected="selected">13.5</option>
                  <option value="11.5">11.5</option>
                  <option value="9.5">9.5</option>
                @elseif ($topping->pieSize == 11.5)
                  <option value="13.5">13.5</option>
                  <option value="11.5" selected="selected">11.5</option>
                  <option value="9.5">9.5</option>
                @elseif ($topping->pieSize == 9.5)
                  <option value="13.5">13.5</option>
                    <option value="11.5">11.5</option>
                  <option value="9.5" selected="selected">9.5</option>
                @endif
              </select>
            </div>

            <div class="form-group">
              <label for="weightPerPieGm">Weight Per Pie (Grams)</label>
              <input type="float" class="form-control" id="weightPerPieGm" name="weightPerPieGm" value="{{old('weightPerPieGm', $topping->weightPerPieGm)}}" />
            </div>

            <div class="form-group">
              <label for="price">Price (€)</label>
              <input type="float" class="form-control" id="price" name="price" value="{{old('price', $topping->price)}}" />
            </div>

            <a href="{{route('admin.toppings.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
