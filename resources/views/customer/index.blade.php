@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>নাম</td>
            <td>মোবাইল নাম্বার</td>
            <td>ঠিকানা</td>
            <td>বাকি টাকা</td>
            <td>ক্রয়</td>
            <td>তারিখ</td>
          </tr>
      </thead>
      <tbody>
          @foreach($records as $record)
          <tr>
              <td><a href="{{ url('customer', ['id' => $record->id]) }}">{{$record->name}}</a></td>
              <td>{{$record->mobile}}</td>
              <td>{{$record->address}}</td>
              <td>{{$record->due_money}}</td>
              <td>{{ucfirst(trans($record->source))}}</td>
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
