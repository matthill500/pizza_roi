@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Pizza: {{ $pizza->name }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Name</td>
              <td>{{ $pizza->name }}</td>
            </tr>
            <tr>
              <td>Size</td>
              <td>{{ $pizza->size }}</td>
            </tr>
            <tr>
              <td>Retail Price</td>
              <td>{{ $pizza->retailPrice }}</td>
            </tr>
            <tr>
              <td>Wholesale Price</td>
              <td>{{ $pizza->wholesalePrice }}</td>
            </tr>
            <tr>
              <td>Toppings</td>
              <td>
              @foreach ($pizza->toppings as $topping)
              {{ $topping->name}}       
              @endforeach
              </td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.pizzas.index') }}" class="btn submit btn-primary">Back</a>
        <a href="{{ route('admin.pizzas.edit', $pizza->id) }}" class="btn submit btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.pizzas.destroy', $pizza->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
