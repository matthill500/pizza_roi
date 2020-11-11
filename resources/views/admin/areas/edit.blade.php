@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Area
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
          <form method="POST" action="{{route('admin.areas.update', $area->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="title">Area</label>
              <input type="text" class="form-control" id="area" name="area" value="{{old('area', $area->area)}}" />
            </div>

            <div class="form-group">
              <label for="shop">Shop</label>
              <select name="shop_id">
                @foreach($shops as $shop)
                  <option value="{{$shop->id}}" {{ (old('shop_id') == $shop->id) ? 'selected' : '' }} >
                    {{$shop->name}}
                  </option>
                @endforeach
              </select>
            </div>


            <a href="{{route('admin.areas.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
