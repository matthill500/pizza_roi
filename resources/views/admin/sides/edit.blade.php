@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Side
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
          <form method="POST" action="{{route('admin.sides.update', $side->id)}}" enctype="multipart/form-data">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name', $side->name)}}" />
            </div>

            <div class="form-group">
              <label for="last_name">Retail Price</label>
              <input type="text" class="form-control" id="retailPrice" name="retailPrice" value="{{old('retailPrice', $side->retailPrice)}}" />
            </div>

            <div class="form-group">
              <label for="last_name">Whole Price</label>
              <input type="text" class="form-control" id="wholesalePrice" name="wholesalePrice" value="{{old('wholesalePrice', $side->wholesalePrice)}}" />
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">Image</label>
                  <div class="custom-file col-md-6">
              <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
              <label class="custom-file-label" for="image">Side Image</label>
            </div>
          </div>


            <a href="{{route('admin.sides.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
