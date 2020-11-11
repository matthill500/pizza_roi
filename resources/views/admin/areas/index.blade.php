@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Areas
          <a href="{{route('admin.areas.create')}}" class="btn btn-success float-right">Create an Area</a>
        </div>
        <div class="card-body card-body2">
        @if (count($areas) === 0)
        <p> There are no areas</p>
        @else
        <table id="table-areas" class="table table-hover">
          <thead>
            <th>Area</th>
            <th>Shop</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($areas as $area)


              <tr data-id="{{$area->id}}">
                <td>{{ $area->area }}</td>
                <td>{{ $area->shop->name }}</td>
                <td></td>



                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.areas.edit', $area->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.areas.destroy', $area->id) }}">
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
