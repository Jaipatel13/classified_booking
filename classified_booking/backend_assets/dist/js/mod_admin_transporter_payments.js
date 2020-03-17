/* START: Get Base URL
*/
    var base_url = window.location.origin;
    base_url += "/classified_booking/admin";
    
    // "http://test.com"

    var host = window.location.host;    
    // test.com

    var pathArray = window.location.pathname.split( '/' );    
    // ["", "questions", "12345678", "get-the-base-url-in-javascript"]
/* END: Get Base URL
*/


/* START: Order Status Updatation
*/
$(document).ready(function() {    

    /* START: Order Status Updatation
    */ 
        $('.cls_delete_payment').bind('click', function(e) {
          order_id = $(this).attr('data-order-id');
          e.preventDefault();
          $('#confirm-delete-'+order_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/transporter_payments/deletePayment/",
                method: "post",
                data: "order_id="+order_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="payment-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#payment-delete-help-block").remove();
                    $("#message_block_order_status_update").html(content);
                        if(result.message == "Payment Details deleted Successfully")
                        {                            
                            //$("#tbl_customer_orders").load(" #tbl_customer_orders");

                            location.reload();

                            //var table = $('#tbl_customer_orders').DataTable();                            
                            //var tr = $("#order-tr-id-"+result.order_id);                             
                            //tr.find('td:eq(0)').html( 'Updated' );

                            //$("#order-tr-id-"+result.order_id).remove();
                            //window.location.href = base_url+"/customer_orders";
                            //$('#tbl_customer_orders').DataTable().clear().draw();                            
                        }
                        else
                        {                            
                            $("#payment-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });        

    /* END: Order Status Updatation
    */

    /* START: Add Payment
    */ 

    $('#add_payment_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            payment_amount: {
                validators: {
                    notEmpty: {
                        field: 'payment_amount',
                        message: 'Please enter Payment Amount'
                    },
                }
            },
        }
    });

    $('#add_payment_submit').bind('click', function(e) {

          var form_data = $("#add_payment_form").serialize();
              
            $.ajax({
                url: base_url+"/transporter_payments/addPayment/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="payment-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#payment-add-help-block").remove();
                    $("#message_block_payment_add").html(content);
                        if(result == "Payment added Successfully")
                        {
                            $("#add_payment_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#payment-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Add Payment
    */ 

    /* START: Edit Payment
    */ 

    $('#edit_payment_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            payment_amount: {
                validators: {
                    notEmpty: {
                        field: 'payment_amount',
                        message: 'Please enter Payment Amount'
                    },
                }
            },
        }
    });

    $('#edit_payment_submit').bind('click', function(e) {

          var form_data = $("#edit_payment_form").serialize();
              
            $.ajax({
                url: base_url+"/transporter_payments/editPayment/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="payment-edit-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#payment-edit-help-block").remove();
                    $("#message_block_payment_edit").html(content);
                        if(result == "Payment updated Successfully")
                        {
                            $("#edit_payment_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#payment-edit-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Edit Payment
    */ 

    /* START: Load Add Transporter Payment Page
    */
        $('.cls_add_payment').bind('click', function(e) {
          transporter_id = $(this).attr('data-transporter-id');
              
            $.ajax({
                url: base_url+"/transporter_payments/transporterAddPaymentFormLoad",
                method: "post",
                data: "transporter_id="+transporter_id,
                success: function(result){
                    window.location.href = base_url+"/transporter_payments/addPaymentForm";
                }
            });
            
        });

    /* END: Load Add Transporter Payment Page
    */

    /* START: Edit Payment
    */
        $('.cls_edit_payment').bind('click', function(e) {
          transporter_payment_details_id = $(this).attr('data-payment-id');
          payment_date = $(this).attr('data-payment-date');
          transporter_name = $(this).attr('data-transporter-name');
          payment_comments = $(this).attr('data-payment-comments');
          transporter_id = $(this).attr('data-transporter-id');
          payment_amount = $(this).attr('data-payment-amount');
              
            $.ajax({
                url: base_url+"/transporter_payments/transporterEditPaymentFormLoad/",
                method: "post",
                data: "transporter_payment_details_id="+transporter_payment_details_id+"&payment_date="+payment_date+"&transporter_name="+transporter_name+"&payment_comments="+payment_comments+"&transporter_id="+transporter_id+"&payment_amount="+payment_amount,                
                success: function(result){
                    window.location.href = base_url+"/transporter_payments/editPaymentForm";
                }
            });
            
        });

    /* END: Edit Payment
    */

});
/* END: Order Status Updatation
*/