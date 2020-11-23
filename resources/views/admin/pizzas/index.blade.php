@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Shops
          <a href="{{route('admin.pizzas.create')}}" class="btn btn-success float-right">Create a Pizza</a>
        </div>
        <div class="card-body card-body2">
        @if (count($pizzas) === 0)
        <p> There are no pizzas</p>
        @else
        <table id="table-pizzas" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>size</th>
            <th>retailPrice</th>
            <th>wholesalePrice</th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($pizzas as $pizza)

              <tr data-id="{{$pizza->id}}">
                <td>{{ $pizza->name }}</td>
                <td>{{ $pizza->size }}</td>
                <td>€{{ $pizza->retailPrice }}</td>
                <td>€{{ $pizza->wholesalePrice }}</td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.pizzas.edit', $pizza->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.pizzas.destroy', $pizza->id) }}">
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
