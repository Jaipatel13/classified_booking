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


/* START: Customers Updation
*/
$(document).ready(function() {        

    /* START: Delete Transporter
    */
        $('.cls_delete_transporter').bind('click', function(e) {
          transporter_id = $(this).attr('data-transporter-id');
          e.preventDefault();
          $('#confirm-delete-'+transporter_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/transporters/deleteTransporters/",
                method: "post",
                data: "transporter_id="+transporter_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="transporters-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#transporters-delete-help-block").remove();
                    $("#message_block_transporters_update").html(content);
                        if(result.message == "Transporter deleted Successfully")
                        {   
                            location.reload();
                        }
                        else
                        {                            
                            $("#transporters-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete Transporter
    */    

    /* START: Edit Transporter
    */
        $('.cls_update_profile_transporter').bind('click', function(e) {
          transporter_id = $(this).attr('data-transporter-id');
          transporter_name = $(this).attr('data-transporter-name');
              
            $.ajax({
                url: base_url+"/transporters/transporterProfileLoad",
                method: "post",
                data: "transporter_id="+transporter_id+"&transporter_name="+transporter_name,
                success: function(result){
                    window.location.href = base_url+"/transporter_profile";
                }
            });
            
        });

    /* END: Edit Transporter
    */

    /* START: Load Transporter Payment Page
    */
        $('.cls_update_payment_transporter').bind('click', function(e) {
          transporter_id = $(this).attr('data-transporter-id');
          transporter_name = $(this).attr('data-transporter-name');
              
            $.ajax({
                url: base_url+"/transporters/transporterPaymentLoad",
                method: "post",
                data: "transporter_id="+transporter_id+"&transporter_name="+transporter_name,
                success: function(result){
                    window.location.href = base_url+"/transporter_payments";
                }
            });
            
        });

    /* END: Load Transporter Payment Page
    */

    /* START: Load Transporter Payment Requests Page
    */
        $('.cls_update_payment_request_transporter').bind('click', function(e) {
          transporter_id = $(this).attr('data-transporter-id');
          transporter_name = $(this).attr('data-transporter-name');
              
            $.ajax({
                url: base_url+"/transporters/transporterPaymentRequestsLoad",
                method: "post",
                data: "transporter_id="+transporter_id+"&transporter_name="+transporter_name,
                success: function(result){
                    window.location.href = base_url+"/transporter_payments_requests";
                }
            });
            
        });

    /* END: Load Transporter Payment Requests Page
    */

});
/* END: Transporters Updation
*/