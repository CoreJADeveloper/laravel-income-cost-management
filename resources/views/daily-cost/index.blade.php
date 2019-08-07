@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daily Cost portion</h1>

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>খরচের বিবরণ</td>
            <td>টাকা</td>
            <td>মন্তব্য</td>
            <td>তারিখ</td>
          </tr>
      </thead>
      <tbody>
          @foreach($records as $record)
          <tr>
              <td>{{$record->cost_type}}</td>
              <td>{{$record->amount}}</td>
              <td>{{$record->comment}}</td>
              <td>{{$record->created_at->setTimezone(new DateTimeZone('GMT+6'))->format('d F Y, h:i A')}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-xs-center">
      {{ $records->links() }}
    </div>
    @else
      <p>No records found</p>
    @endif
</div>
@endsection
