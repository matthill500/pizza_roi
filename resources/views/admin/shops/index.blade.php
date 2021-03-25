@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Shops
          <a href="{{route('admin.shops.create')}}" class="btn btn-success float-right">Create a Shop</a>
        </div>
        <div class="card-body card-body2">
        @if (count($shops) === 0)
        <p> There are no shops</p>
        @else
        <table id="table-shops" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>shopCode</th>
            <th>Email</th>
            <th>Eircode</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($shops as $shop)

              <tr data-id="{{$shop->id}}">
                <td>{{ $shop->name }}</td>
                <td>{{ $shop->shopCode }}</td>
                <td>{{ $shop->user->email }}</td>
                <td>{{ $shop->eircode }}</td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.shops.edit', $shop->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.shops.destroy', $shop->id) }}">
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
