@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form method="GET" action="{{ url('report/result') }}" id="report">
        
        <div class="form-group">
          <label for="report">আপনি কিসের রিপোর্ট চান?</label>
          <select id="report-criteria" name="report" class="form-control">
            <option value="cement">সিমেন্ট</option>
            <option value="rod">রড</option>
            <option value="bank_saving">ব্যাংকে টাকা জমার হিসাব</option>
            <option value="due_collection">ক্যাশ টাকা জমার হিসাব</option>
          </select>
        </div>

        <div class="form-group customer-information">
          <label for="customer_name">কাস্টমারের নাম</label>
          <input id="customer_name"
          type="text"
          name="customer_name"
          class="form-control">
        </div>

        <div class="form-group customer-information">
          <label for="customer_mobile">কাস্টমারের মোবাইল নাম্বার</label>
          <input id="customer_mobile"
          type="text"
          name="customer_mobile"
          class="form-control">
        </div>

        <div class="form-group">
          <label>রিপোর্ট শুরুর তারিখ</label>
          <div class="input-group startDate">
            <input type="text" name="report_start_date" class="@error('report_start_date') is-invalid @enderror form-control" value="" readonly>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
          @error('report_start_date')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label>রিপোর্ট শেষের তারিখ</label>
          <div class="input-group endDate">
            <input type="text" name="report_end_date" class="@error('report_end_date') is-invalid @enderror form-control" value="" readonly>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
          @error('report_end_date')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div id="report-actual" class="form-group">
          <label for="report_type">আপনি কি ধরনের রিপোর্ট চান?</label>
          <select name="report_type" class="form-control">
            <option value="sell">বিক্রয় হিসাব</option>
            <option value="buy">ক্রয় হিসাব</option>
            <option value="due_money">বাকি টাকার হিসাব</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit" />
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
