jQuery('document').ready(function($){
  var template_html = '';

  var check_payment_type_due = function(){
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

  var get_employee_template = function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
       type:'POST',
       url:'/get-customer-template',
       success:function(data){
         template_html = data.success;

         $('#cement-create-record #customer-information').append(template_html);
       }
    });
  }

  $('#cement-create-record #total_amount').on('input', function() {
      var payment_type_due = check_payment_type_due();

      if(!payment_type_due){
        template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && template_html == '')
        get_employee_template();
  });

  $('#cement-create-record #rate').on('input', function() {
      var payment_type_due = check_payment_type_due();

      if(!payment_type_due){
        template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && template_html == '')
        get_employee_template();
  });

  $('#cement-create-record #price').on('input', function() {
      var payment_type_due = check_payment_type_due();

      if(!payment_type_due){
        template_html = '';
        $('#cement-create-record #customer-information').empty();
      }

      if(payment_type_due && template_html == '')
        get_employee_template();
  });


})
