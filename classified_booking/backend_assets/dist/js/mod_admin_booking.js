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


/* START: Booking Updation
*/
$(document).ready(function() {        

    /* START: Delete Booking
    */
        $('.cls_delete_booking').bind('click', function(e) {
          booking_id = $(this).attr('data-booking-id');
          e.preventDefault();
          $('#confirm-delete-'+booking_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/booking/deleteBooking/",
                method: "post",
                data: "booking_id="+booking_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="booking-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#booking-delete-help-block").remove();
                    $("#message_block_booking_update").html(content);
                        if(result.message == "Booking deleted Successfully")
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
                            $("#booking-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete Booking
    */

    /* START: View Booking
    */
        $('.cls_view_booking').bind('click', function(e) {
          booking_id = $(this).attr('data-booking-id');
          e.preventDefault();
          $('#confirm-view-'+booking_id).modal({
              backdrop: 'static',
              keyboard: false        
          });
        });

    /* END: View Booking
    */   
    


    
});
/* END: Booking Updation
*/