@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>মোট বস্তা</td>
            <td>দর</td>
            <td>জমা</td>
            <td>কাস্টমারের নাম</td>
            <td>ব্র্যান্ড</td>
            <td>ডিও নং</td>
            <td>তারিখ</td>
          </tr>
      </thead>
      <tbody>
          @foreach($records as $record)
          <tr>
              <td>{{$record->total_amount}}</td>
              <td>{{$record->rate}}</td>
              <td>{{$record->price}}</td>
              <td>{{$record->customer_name}}</td>
              <td>{{$brands[$record->brand]}}</td>
              <td>{{$record->due_no}}</td>
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
