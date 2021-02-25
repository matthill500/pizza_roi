@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Toppings
          <a href="{{route('admin.toppings.create')}}" class="btn btn-success float-right">Create a Topping</a>
        </div>
        <div class="card-body card-body2">
        @if (count($toppings) === 0)
        <p> There are no toppings</p>
        @else
        <table id="table-toppings" class="table table-hover">
          <thead>
            <th>Name</th>
            <!-- <th>Stock Quantity</th> -->
            <th>price</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($toppings as $topping)

              <tr data-id="{{$topping->id}}">
                <td>{{ $topping->name }}</td>
                <!-- <td>{{ $topping->Qty }}</td> -->
                <td>€{{ $topping->price }}</td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.toppings.edit', $topping->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.toppings.destroy', $topping->id) }}">
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
