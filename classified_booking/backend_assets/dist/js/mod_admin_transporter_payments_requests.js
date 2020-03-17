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


/* START: Payment Request Updatation
*/
$(document).ready(function() {    

    /* START: Payment Request Updatation
    */ 
        $('.cls_delete_payment_request').bind('click', function(e) {
          order_id = $(this).attr('data-order-id');
          e.preventDefault();
          $('#confirm-delete-'+order_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/transporter_payments_requests/deletePaymentRequest/",
                method: "post",
                data: "order_id="+order_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="payment-request-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#payment-request-delete-help-block").remove();
                    $("#message_block_order_status_update").html(content);
                        if(result.message == "Payment Request deleted Successfully")
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
                            $("#payment-request-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });        

    /* END: Payment Request Updatation
    */    

    /* START: Edit Payment Request
    */ 

    $('#edit_payment_request_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            payments_requests_status: {
                validators: {
                    notEmpty: {
                        field: 'payments_requests_status',
                        message: 'Please select Payment Request Status'
                    },
                }
            },
        }
    });

    $('#edit_payment_request_submit').bind('click', function(e) {

          var form_data = $("#edit_payment_request_form").serialize();
              
            $.ajax({
                url: base_url+"/transporter_payments_requests/editPaymentRequest/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="payment-request-edit-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#payment-request-edit-help-block").remove();
                    $("#message_block_payment_request_edit").html(content);
                        if(result == "Payment Request updated Successfully")
                        {
                            $("#edit_payment_request_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#payment-request-edit-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Edit Payment Request
    */

    /* START: Edit Payment Request
    */
        $('.cls_edit_payment_request').bind('click', function(e) {
          transporter_payments_requests_id = $(this).attr('data-payment-id');
          payment_date = $(this).attr('data-payment-date');
          transporter_name = $(this).attr('data-transporter-name');
          payment_comments = $(this).attr('data-payment-comments');
          transporter_id = $(this).attr('data-transporter-id');
          payment_status = $(this).attr('data-payment-status');
          payment_amount = $(this).attr('data-payment-amount');
          payment_description = $(this).attr('data-payment-description');
              
            $.ajax({
                url: base_url+"/transporter_payments_requests/transporterEditPaymentRequestFormLoad/",
                method: "post",
                data: "transporter_payments_requests_id="+transporter_payments_requests_id+"&payment_date="+payment_date+"&transporter_name="+transporter_name+"&payment_comments="+payment_comments+"&transporter_id="+transporter_id+"&payment_status="+payment_status+"&payment_amount="+payment_amount+"&payment_description="+payment_description,                
                success: function(result){
                    window.location.href = base_url+"/transporter_payments_requests/editPaymentRequestForm";
                }
            });
            
        });

    /* END: Edit Payment Request
    */

});
/* END: Order Status Updatation
*/