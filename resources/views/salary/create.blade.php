@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Record</h1>

    <div class="row">
      <div class="col-sm-6">
        <form method="POST" action="{{ route('salaries.store') }}">
          @csrf

          <div class="form-group">
            <label for="employee_name">কর্মচারীর নাম</label>
            <input id="employee_name"
            type="text"
            name="employee_name"
            class="@error('employee_name') is-invalid @enderror form-control">
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
