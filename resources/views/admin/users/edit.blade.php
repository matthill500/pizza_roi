@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit User
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
          <form method="POST" action="{{route('admin.users.update', $user->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="first_name">First name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name', $user->first_name)}}" />
            </div>

            <div class="form-group">
              <label for="last_name">Last name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name', $user->last_name)}}" />
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}" />
            </div>

            <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
