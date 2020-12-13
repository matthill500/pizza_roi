@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Order Number: {{ $order->id }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Status</td>
              <td>{{ $order->status }}</td>
            </tr>
            <tr>
              <td>Comments</td>
              <td>{{ $order->comments }}</td>
            </tr>
            <tr>
              <td>Price</td>
              <td>€{{ $order->price }}</td>
            </tr>
            <tr>
              <td>Coupon</td>

              <td>@isset($order->coupon->code){{ $order->coupon->code }}@endisset</td>
            </tr>
            <tr>
              <td>Shop</td>
              <td>{{ $order->shop->name }}</td>
            </tr>
            <tr>
              <td>Customer Details</td>
              <td>
                <ul>
                  <li>{{$order->customer->user->first_name}} {{$order->customer->user->last_name}}</li>
                  <li>{{$order->customer->user->email}}</li>
                  <li>{{$order->customer->phone}}</li>
                  <li>{{$order->customer->age}}</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Order Details</td>
              <td>
                <ul>
                  @foreach ($order->pizzas as $pizza)<li>{{$pizza->name}}</li>@endforeach
                  @foreach ($order->deals as $deal)<li>{{$deal->name}}</li>@endforeach
                  @foreach ($order->sides as $side)<li>{{$side->name}}</li>@endforeach
                </ul>
              </td>
            </tr>


          </tbody>
        </table>

        <a href="{{ route('admin.orders.index') }}" class="btn submit btn-primary">Back</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.orders.destroy', $order->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
