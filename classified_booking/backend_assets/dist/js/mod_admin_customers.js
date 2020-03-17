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

    /* START: Delete Customer
    */
        $('.cls_delete_customer').bind('click', function(e) {
          customer_id = $(this).attr('data-customer-id');
          e.preventDefault();
          $('#confirm-delete-'+customer_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/customers/deleteCustomers/",
                method: "post",
                data: "customer_id="+customer_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="customers-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#customers-delete-help-block").remove();
                    $("#message_block_customers_update").html(content);
                        if(result.message == "Customer deleted Successfully")
                        {   
                            location.reload();
                        }
                        else
                        {                            
                            $("#customers-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete Customers
    */    

    /* START: Edit Customer
    */
        $('.cls_update_profile').bind('click', function(e) {
          customer_id = $(this).attr('data-customer-id');
              
            $.ajax({
                url: base_url+"/customers/customerProfileLoad",
                method: "post",
                data: "customer_id="+customer_id,
                success: function(result){
                    window.location.href = base_url+"/customer_profile";
                }
            });
            
        });

    /* END: Edit Customer
    */

});
/* END: Customers Updation
*/