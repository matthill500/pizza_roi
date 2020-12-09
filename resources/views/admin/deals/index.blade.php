@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Deals
          <a href="{{route('admin.deals.create')}}" class="btn btn-success float-right">Create a Deal</a>
        </div>
        <div class="card-body card-body2">
        @if (count($deals) === 0)
        <p> There are no details</p>
        @else
        <table id="table-deals" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>Retail Price</th>
            <th></th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($deals as $deal)

              <tr data-id="{{$deal->id}}">
                <td>{{ $deal->name }}</td>
                <td>€{{ $deal->retailPrice }}</td>
                <td></td>
                <td></td>

                <td>
                 <div class="float-right">
                  <a href="{{ route('admin.deals.show', $deal->id) }}" class="btn submit btn-primary" >View</a>
                  <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-warning submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.deals.destroy', $deal->id) }}">
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
