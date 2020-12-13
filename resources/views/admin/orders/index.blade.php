@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Orders
        </div>
        <div class="card-body card-body2">
        @if (count($orders) === 0)
        <p> There are no orders</p>
        @else
        <table id="table-deals" class="table table-hover">
          <thead>
            <th>Order Number</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Price</th>
            <th>Shop</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($orders as $order)

              <tr data-id="{{$order->id}}">
                <td>{{ $order->id }}</td>
                <td>{{ $order->status }}</td>
                <td>{{$order->customer->phone}}</td>
                <td>€{{ $order->price }}</td>
                <td>{{ $order->shop->name }}</td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.orders.show', $order->id) }}" class="btn submit btn-primary" >View</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.orders.destroy', $order->id) }}">
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
