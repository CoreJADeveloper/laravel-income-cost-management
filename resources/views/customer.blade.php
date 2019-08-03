<div class="form-group">
  <label for="mobile">কাস্টমারের মোবাইল নাম্বার</label>
  <input id="mobile"
  type="text"
  name="mobile"
  class="@error('mobile') is-invalid @enderror form-control">
  @error('mobile')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="national_id">কাস্টমারের ন্যাশনাল আইডি</label>
  <input id="national_id"
  type="text"
  name="national_id"
  class="form-control">
</div>

<div class="form-group">
  <label for="address">কাস্টমারের ঠিকানা</label>
  <textarea id="address"
  name="address"
  class="form-control"></textarea>
</div>

<div class="form-group">
  <label for="bank_name">ব্যাংকের নাম</label>
  <input id="bank_name"
  type="text"
  name="bank_name"
  class="form-control">
</div>

<div class="form-group">
  <label for="bank_account_no">ব্যাংক অ্যাকাউন্ট নাম্বার</label>
  <input id="bank_account_no"
  type="text"
  name="bank_account_no"
  class="form-control">
</div>
