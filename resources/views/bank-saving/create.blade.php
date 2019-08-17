@extends('layouts.app')

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/script.js')}}"></script>
@endpush

@section('content')
<div class="container" id="bank-saving-create-record">
    <div class="row">
      <div class="col-sm-6">
        <form method="POST" action="{{ route('bank-savings.store') }}">
          @csrf

          <div class="form-group">
            <label for="bank_account_number">হিসাব নং</label>
            <input id="bank_account_number"
            type="text"
            name="bank_account_number"
            class="@error('bank_account_number') is-invalid @enderror form-control">
            @error('bank_account_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
