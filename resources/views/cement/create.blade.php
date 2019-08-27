@extends('layouts.app')

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/script.js')}}"></script>
@endpush

@section('content')
<div class="container" id="cement-create-record">
    
    <div class="row">
      <div class="col-sm-6">
        <form method="POST" action="{{ route('cement.store') }}">
          @csrf

          <div class="form-group">
            <label for="total_amount">মোট বস্তা</label>
            <input id="total_amount"
            type="number"
            name="total_amount"
            class="@error('total_amount') is-invalid @enderror form-control">
            @error('total_amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="rate">দর</label>
            <input id="rate"
            type="number"
            name="rate"
            class="@error('rate') is-invalid @enderror form-control">
            @error('rate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="price">জমা</label>
            <input id="price" type="number" name="price" class="@error('price') is-invalid @enderror form-control">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="customer_name">কাস্টমারের নাম</label>
            <input id="customer_name" type="text" name="customer_name" class="@error('customer_name') is-invalid @enderror form-control">
            @error('customer_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div id="customer-information">
          </div>

          <div class="form-group">
            <label for="brand">ব্র্যান্ড</label>
            <select name="brand" class="@error('brand') is-invalid @enderror form-control">
              @foreach($records as $record)
                <option value="{{$record->id}}">{{$record->name}}</option>
              @endforeach
            </select>
            @error('brand')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="due_no">ডিও নং</label>
            <input id="due_no" type="number" name="due_no" class="@error('due_no') is-invalid @enderror form-control">
            @error('due_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit" />
          </div>

        </form>
      </div>
    </div>
</div>
@endsection
