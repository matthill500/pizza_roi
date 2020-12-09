@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Sides
          <a href="{{route('admin.sides.create')}}" class="btn btn-success float-right">Create a Side</a>
        </div>
        <div class="card-body card-body2">
        @if (count($sides) === 0)
        <p> There are no sides</p>
        @else
        <table id="table-sides" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>Retail Price</th>
            <th>Wholesale Price</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($sides as $side)

              <tr data-id="{{$side->id}}">
                <td>{{ $side->name }}</td>
                <td>€{{ $side->retailPrice }}</td>
                <td>€{{ $side->wholesalePrice }}</td>
                <td></td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.sides.edit', $side->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.sides.destroy', $side->id) }}">
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
