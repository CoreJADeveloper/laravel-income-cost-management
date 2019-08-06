@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer portion</h1>

    <table class="table table-striped">
      <tbody>
        <tr>
            <td>নাম</td>
            <td>{{$record->name}}</td>
        </tr>
        <tr>
            <td>মোবাইল নাম্বার</td>
            <td>{{$record->mobile}}</td>
        </tr>
        @if($product->total_amount && $record->source == 'cement')
        <tr>
            <td>মোট বস্তা</td>
            <td>{{$product->total_amount}}</td>
        </tr>
        @endif
        @if($product->total_amount && $record->source == 'rod')
        <tr>
            <td>কেজি</td>
            <td>{{$product->total_amount}}</td>
        </tr>
        @endif
        @if($product->rate)
        <tr>
            <td>দর</td>
            <td>{{$product->rate}}</td>
        </tr>
        @endif
        @if($product->price)
        <tr>
            <td>জমা</td>
            <td>{{$product->price}}</td>
        </tr>
        @endif
        <tr>
            <td>বাকি টাকা</td>
            <td>{{$record->due_money}}</td>
        </tr>
        <tr>
            <td>ক্রয়</td>
            <td>{{ucfirst(trans($record->source))}}</td>
        </tr>
        <tr>
            <td>ঠিকানা</td>
            <td>{{$record->address}}</td>
        </tr>
        <tr>
            <td>ন্যাশনাল আইডি</td>
            <td>{{$record->national_id}}</td>
        </tr>
        <tr>
            <td>ব্যাংকের নাম</td>
            <td>{{$record->bank_name}}</td>
        </tr>
        <tr>
            <td>ব্যাংক অ্যাকাউন্ট নাম্বার</td>
            <td>{{$record->bank_account_number}}</td>
        </tr>
      </tbody>
    </table>
</div>
@endsection
