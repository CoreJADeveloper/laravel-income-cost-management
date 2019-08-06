jQuery('document').ready(function($){

  // Cement Record

  var cement_template_html = '';

  var check_cement_payment_type_due = function(){
    var amount = $('#cement-create-record #total_amount').val();
    var rate = $('#cement-create-record #rate').val();
    var price = $('#cement-create-record #price').val();

    if(amount && rate && price){
      var amount = parseInt(amount);
      var rate = parseInt(rate);
      var price = parseInt(price);

      var total_price = amount * rate;
      if(total_price <= price)
        return false;
      else
        return true;
    } else {
      return false;
    }
  };

  var get_cement_employee_template = function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
       type:'POST',
       url:'/get-customer-template',
       success:function(data){
         cement_template_html = data.success;

         $('#cement-create-record #customer-information').append(cement_template_html);
       }
    });
  }

  $('#cement-create-record #total_amount').on('input', function() {
      var payment_type_due = check_cement_payment_type_due();

      if(!payment_type_due){
        cement_template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && cement_template_html == '')
        get_cement_employee_template();
  });

  $('#cement-create-record #rate').on('input', function() {
      var payment_type_due = check_cement_payment_type_due();

      if(!payment_type_due){
        cement_template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && cement_template_html == '')
        get_cement_employee_template();
  });

  $('#cement-create-record #price').on('input', function() {
      var payment_type_due = check_cement_payment_type_due();

      if(!payment_type_due){
        cement_template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && cement_template_html == '')
        get_cement_employee_template();
  });

  // Rod Record

  var rod_template_html = '';

  var check_rod_payment_type_due = function(){
    var amount = $('#rod-create-record #total_amount').val();
    var rate = $('#rod-create-record #rate').val();
    var price = $('#rod-create-record #price').val();

    if(amount && rate && price){
      var amount = parseInt(amount);
      var rate = parseInt(rate);
      var price = parseInt(price);

      var total_price = amount * rate;
      if(total_price <= price)
        return false;
      else
        return true;
    } else {
      return false;
    }
  };

  var get_rod_employee_template = function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
       type:'POST',
       url:'/get-customer-template',
       success:function(data){
         rod_template_html = data.success;

         $('#rod-create-record #customer-information').append(rod_template_html);
       }
    });
  }

  $('#rod-create-record #total_amount').on('input', function() {
      var payment_type_due = check_rod_payment_type_due();

      if(!payment_type_due){
        rod_template_html = '';
        $('#rod-create-record #customer-information').empty();
      }

      if(payment_type_due && rod_template_html == '')
        get_rod_employee_template();
  });

  $('#rod-create-record #rate').on('input', function() {
      var payment_type_due = check_rod_payment_type_due();

      if(!payment_type_due){
        rod_template_html = '';
        $('#rod-create-record #customer-information').empty();
      }

      if(payment_type_due && rod_template_html == '')
        get_rod_employee_template();
  });

  $('#rod-create-record #price').on('input', function() {
      var payment_type_due = check_rod_payment_type_due();

      if(!payment_type_due){
        rod_template_html = '';
        $('#rod-create-record #customer-information').empty();
      }

      if(payment_type_due && rod_template_html == '')
        get_rod_employee_template();
  });

})
