@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer portion</h1>

    @if(count($records) > 0)
    <table class="table table-striped">
      <thead>
          <tr>
            <td>নাম</td>
            <td>মোবাইল নাম্বার</td>
            <td>ন্যাশনাল আইডি</td>
            <td>ঠিকানা</td>
            <td>ব্যাংকের নাম</td>
            <td>ব্যাংক অ্যাকাউন্ট নাম্বার</td>
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
              <td>{{$record->national_id}}</td>
              <td>{{$record->address}}</td>
              <td>{{$record->bank_name}}</td>
              <td>{{$record->bank_account_number}}</td>
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
