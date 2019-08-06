@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rod portion</h1>

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>Name</td>
            <td>Active</td>
          </tr>
      </thead>
      <tbody>
          @foreach($records as $record)
          <tr>
              <td>{{$record->name}}</td>
              <td>
                <input type="checkbox" name="brand_active" value="{{$record->active}}" @if($record->active === 1) checked @endif />
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    @else
      <p>No records found</p>
    @endif
</div>
@endsection
