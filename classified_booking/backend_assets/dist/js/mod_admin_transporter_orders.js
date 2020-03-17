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
        $('.cls_delete_order').bind('click', function(e) {
          order_id = $(this).attr('data-order-id');
          e.preventDefault();
          $('#confirm-delete-'+order_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/transporter_orders/deleteOrder/",
                method: "post",
                data: "order_id="+order_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="order-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#order-delete-help-block").remove();
                    $("#message_block_order_status_update").html(content);
                        if(result.message == "Order deleted Successfully")
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
                            $("#order-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });        

    /* END: Order Status Updatation
    */
    
});
/* END: Order Status Updatation
*/