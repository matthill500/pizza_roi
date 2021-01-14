@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Deal: {{ $deal->name }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Name</td>
              <td>{{ $deal->name }}</td>
            </tr>
            <tr>
              <td>Description</td>
              <td>{{ $deal->description }}</td>
            </tr>
            <tr>
              <td>Retail Price</td>
              <td>{{ $deal->retailPrice }}</td>
            </tr>
            <tr>
              <td>Pizzas</td>
              <td>
                <ul>
                  @foreach($deal->pizzas as $pizza)
                    <li>{{ $pizza->name}}</li>
                  @endforeach
                </ul>
              </td>
            </tr>
            <tr>
              <td>Sides</td>
              <td>
                <ul>
                  @foreach($deal->sides as $side)
                    <li>{{ $side->name}}</li>
                  @endforeach
                </ul>
              </td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.deals.index') }}" class="btn submit btn-primary">Back</a>
        <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn submit btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.deals.destroy', $deal->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
