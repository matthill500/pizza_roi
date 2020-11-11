@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Users
          <a href="{{route('admin.users.create')}}" class="btn btn-success float-right">Create an administrator</a>
        </div>
        <div class="card-body card-body2">
        @if (count($users) === 0)
        <p> There are no users</p>
        @else
        <table id="table-users" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($users as $user)
              @foreach ($user->roles as $role)
              <tr data-id="{{$user->id}}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $role->name}}</td>
              @endforeach

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.users.destroy', $user->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div *ngIf="response" class="btn-group">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </div>
                  </form>
                </div>
                </td>
              </tr>

            @endforeach

          </tbody>
        </table>
        @endif
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
