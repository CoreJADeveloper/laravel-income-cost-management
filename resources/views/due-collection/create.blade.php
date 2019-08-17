@extends('layouts.app')

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/script.js')}}"></script>
@endpush

@section('content')
<div class="container" id="bank-saving-create-record">
    <div class="row">
      <div class="col-sm-6">
        <form method="POST" action="{{ route('due-collections.store') }}">
          @csrf

          <div class="form-group">
            <label for="customer_name">কাস্টমারের নাম</label>
            <input id="customer_name"
            type="text"
            name="customer_name"
            class="@error('customer_name') is-invalid @enderror form-control">
            @error('customer_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="customer_mobile">কাস্টমারের মোবাইল নাম্বার</label>
            <input id="customer_mobile"
            type="text"
            name="customer_mobile"
            class="@error('customer_mobile') is-invalid @enderror form-control">
          </div>

          <div class="form-group">
            <label for="amount">টাকা</label>
            <input id="amount"
            type="number"
            name="amount"
            class="@error('amount') is-invalid @enderror form-control">
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="comment">মন্তব্য</label>
            <textarea id="comment" name="comment" class="form-control"></textarea>
            @error('comment')
                <div class="alert alert-danger">{{ $message }}
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
