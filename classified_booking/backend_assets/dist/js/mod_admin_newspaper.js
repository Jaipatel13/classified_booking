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


/* START: newspaper Updation
*/
$(document).ready(function() {        

    /* START: Delete newspaper
    */
        $('.cls_delete_newspaper').bind('click', function(e) {
          newspaper_id = $(this).attr('data-newspaper-id');
          e.preventDefault();
          $('#confirm-delete-'+newspaper_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/newspaper/deleteNewspaper/",
                method: "post",
                data: "newspaper_id="+newspaper_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="newspaper-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#newspaper-delete-help-block").remove();
                    $("#message_block_newspaper_update").html(content);
                        if(result.message == "Newspaper deleted Successfully")
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
                            $("#newspaper-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete newspaper
    */   

    /* START: Update newspaper
    */
        $('.cls_newspaper_name').bind('blur', function(e) {
            newspaper_id = $(this).attr('data-newspaper-id');
            newspaper_name = $(this).text();
              
            $.ajax({
                url: base_url+"/newspaper/updateNewspaper/",
                method: "post",
                data: "newspaper_id="+newspaper_id+"&newspaper_name="+newspaper_name,                
                success: function(result){                    
                    var content = '<small id="newspaper-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#newspaper-update-help-block").remove();
                    $("#message_block_newspaper_update").html(content);
                        if(result == "Newspaper updated Successfully")
                        {
                            //location.reload();
                        }
                        else
                        {                            
                            $("#newspaper-update-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: Update newspaper
    */

    /* START: Add newspaper
    */

        $('#add_newspaper_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            newspaper_name: {
                validators: {
                    notEmpty: {
                        field: 'newspaper_name',
                        message: 'Please enter Newspaper Name'
                    }
                }
            },
        }
    });

        $('#add_newspaper_submit').bind('click', function(e) {

          var form_data = $("#add_newspaper_form").serialize();
              
            $.ajax({
                url: base_url+"/newspaper/addNewspaper/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="newspaper-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#newspaper-add-help-block").remove();
                    $("#message_block_newspaper_add").html(content);
                        if(result == "Newspaper added Successfully")
                        {
                            $("#add_newspaper_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#newspaper-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Add newspaper
    */ 


    
});
/* END: newspaper Updation
*/