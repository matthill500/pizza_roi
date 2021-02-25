@extends('layouts.appShop')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Current Stock
          <a href="{{route('shop.stock.create')}}" class="btn btn-success float-right">Insert Stock Take</a>
        </div>
        <div class="card-body card-body2">
        @if (count($actualStocks) === 0)
        <p> There are no stock items</p>
        @else
        <table id="table-toppings" class="table table-hover">
          <thead>
            <th>Item</th>
            <th>Quantity</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($actualStocks as $actualStock)

              <tr data-id="{{$actualStock->id}}">
                <td>{{ $actualStock->name }}</td>
                <td>{{ $actualStock->Qty }}</td>
                <td></td>
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
