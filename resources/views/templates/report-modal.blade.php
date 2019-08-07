<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportModalLabel">রিপোর্ট</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cement.store') }}" id="report">
          @csrf

          <div class="form-group">
            <label for="report">আপনি কিসের রিপোর্ট চান?</label>
            <select name="report" class="form-control">
              <option value="cement">সিমেন্ট</option>
              <option value="rod">রড</option>
              <option value="both">সিমেন্ট এবং রড</option>
            </select>
            @error('report')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="customer_name">কাস্টমারের নাম</label>
            <input id="customer_name"
            type="text"
            name="customer_name"
            class="form-control">
          </div>

          <div class="form-group">
            <label for="mobile">কাস্টমারের মোবাইল নাম্বার</label>
            <input id="mobile"
            type="text"
            name="mobile"
            class="form-control">
          </div>

          <div class="form-group">
            <label>রিপোর্ট শুরুর তারিখ</label>
            <div class="input-group startDate">
              <input type="text" name="start_date" class="form-control" value="" readonly>
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>রিপোর্ট শেষের তারিখ</label>
            <div class="input-group endDate">
              <input type="text" name="end_date" class="form-control" value="" readonly>
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="report_type">আপনি কি ধরনের রিপোর্ট চান?</label>
            <select name="report_type" class="form-control">
              <option value="sell">বিক্রয় হিসাব</option>
              <option value="buy">ক্রয় হিসাব</option>
              <option value="due_money">বাকি টাকার হিসাব</option>
              <option value="bank_saving">ব্যাংকে টাকা জমার হিসাব</option>
              <option value="cash_saving">ক্যাশ টাকা জমার হিসাব</option>
            </select>
            @error('report_type')
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
</div>
