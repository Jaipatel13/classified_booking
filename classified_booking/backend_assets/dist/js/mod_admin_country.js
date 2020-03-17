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


/* START: Country Updation
*/
$(document).ready(function() {        

    /* START: Delete Country
    */
        $('.cls_delete_country').bind('click', function(e) {
          country_id = $(this).attr('data-country-id');
          e.preventDefault();
          $('#confirm-delete-'+country_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/country/deleteCountry/",
                method: "post",
                data: "country_id="+country_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="country-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#country-delete-help-block").remove();
                    $("#message_block_country_update").html(content);
                        if(result.message == "Country deleted Successfully")
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
                            $("#country-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete Country
    */   

    /* START: Update Country
    */
        $('.cls_country_name').bind('blur', function(e) {
            country_id = $(this).attr('data-country-id');
            country_name = $(this).text();
              
            $.ajax({
                url: base_url+"/country/updateCountry/",
                method: "post",
                data: "country_id="+country_id+"&country_name="+country_name,                
                success: function(result){                    
                    var content = '<small id="country-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#country-update-help-block").remove();
                    $("#message_block_country_update").html(content);
                        if(result == "Country updated Successfully")
                        {
                            //location.reload();
                        }
                        else
                        {                            
                            $("#country-update-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: Update Country
    */

    /* START: Add Country
    */

        $('#add_country_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            country_name: {
                validators: {
                    notEmpty: {
                        field: 'country_name',
                        message: 'Please enter Country Name'
                    }
                }
            },
        }
    });

        $('#add_country_submit').bind('click', function(e) {

          var form_data = $("#add_country_form").serialize();
              
            $.ajax({
                url: base_url+"/country/addCountry/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="country-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#country-add-help-block").remove();
                    $("#message_block_country_add").html(content);
                        if(result == "Country added Successfully")
                        {
                            $("#add_country_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#country-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Add Country
    */ 


    
});
/* END: Country Updation
*/