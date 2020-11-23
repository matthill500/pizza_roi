@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Shop
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
              <label for="weightGm">Weight</label>
              <input type="float" class="form-control" id="weightGm" name="weightGm" value="{{old('weightGm', $topping->weightGm)}}" />
            </div>

            <div class="form-group">
              <label for="price">Price</label>
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
