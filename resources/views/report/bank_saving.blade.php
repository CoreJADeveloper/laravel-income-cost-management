@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>হিসাব নং</td>
            <td>টাকা</td>
            <td>মন্তব্য</td>
            <td>তারিখ</td>
          </tr>
      </thead>
      <tbody>
          @foreach($records as $record)
          <tr>
              <td>{{$record->bank_account_number}}</td>
              <td>{{$record->amount}}</td>
              <td>{{$record->comment}}</td>
              <td>{{Carbon\Carbon::parse($record->created_at)->format('d F Y, h:i A')}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-xs-center">
      {!! $records->render() !!}
    </div>
    @else
      <p>No records found</p>
    @endif
</div>
@endsection
