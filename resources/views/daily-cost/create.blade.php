@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
      <div class="col-sm-6">
        <form method="POST" action="{{ route('daily-costs.store') }}">
          @csrf

          <div class="form-group">
            <label for="cost_type">খরচের বিবরণ</label>
            <input id="cost_type"
            type="text"
            name="cost_type"
            class="@error('cost_type') is-invalid @enderror form-control">
            @error('cost_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="amount">টাকা</label>
            <input id="amount"
            type="number"
            name="amount"
            class="@error('rate') is-invalid @enderror form-control">
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="comment">মন্তব্য</label>
            <textarea id="comment" name="comment" class="@error('price') is-invalid @enderror form-control"></textarea>
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
