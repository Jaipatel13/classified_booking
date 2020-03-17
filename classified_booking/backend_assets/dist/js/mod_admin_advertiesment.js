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
//

/* START: Advertiesment Updation
*/
$(document).ready(function() {        

    /* START: Delete Advertiesment
    */
        $('.cls_delete_advertiesment').bind('click', function(e) {
          advertiesment_id = $(this).attr('data-advertiesment-id');
          e.preventDefault();
          $('#confirm-delete-'+advertiesment_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/advertiesment/deleteAdvertiesment/",
                method: "post",
                data: "advertiesment_id="+advertiesment_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="advertiesment-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#advertiesment-delete-help-block").remove();
                    $("#message_block_advertiesment_update").html(content);
                        if(result.message == "Advertiesment deleted Successfully")
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
                            $("#advertiesment-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete Advertiesment
    */   

    /* START: Edit Advertiesment
    */
        $('.cls_edit_advertiesment').bind('click', function(e) {
          advertiesment_details_id  = $(this).attr('data-advertiesment-id');
                        
            $.ajax({
                url: base_url+"/advertiesment/editAdvertiesmentFormLoad/",
                method: "post",
                data: "advertiesment_details_id="+advertiesment_details_id,  
                success: function(result){
                    window.location.href = base_url+"/advertiesment/editAdvertiesmentForm";
                }
            });
            
        });

    /* END: Edit Advertiesment
    */ 

    /* START: updateAdvertiesmentNameOnly
    */
        $('.cls_advertiesment_name').bind('blur', function(e) {
            advertiesment_id = $(this).attr('data-advertiesment-id');
            advertiesment_name = $(this).text();
              
            $.ajax({
                url: base_url+"/advertiesment/updateAdvertiesmentNameOnly/",
                method: "post",
                data: "advertiesment_id="+advertiesment_id+"&advertiesment_name="+advertiesment_name,                
                success: function(result){                    
                    var content = '<small id="advertiesment-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#advertiesment-update-help-block").remove();
                    $("#message_block_advertiesment_update").html(content);
                        if(result == "Advertiesment updated Successfully")
                        {
                            //location.reload();
                        }
                        else
                        {                            
                            $("#advertiesment-update-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: update AdvertiesmentNameOnly
    */

    /* START: Add/Edit Advertiesment
    */

        $('#add_advertiesment_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            advertiesment_name: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_name',
                        message: 'Please enter Advertiesment Name'
                    }
                }
            },
            advertiesment_height: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_height',
                        message: 'Please enter Advertiesment Height'
                    }
                }
            },
            advertiesment_width: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_width',
                        message: 'Please enter Advertiesment Width'
                    }
                }
            },
            advertiesment_amount: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_amount',
                        message: 'Please enter Advertiesment Amount'
                    }
                }
            },
            category_type: {
                validators: {
                    notEmpty: {
                        field: 'category_type',
                        message: 'Please select Type'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        field: 'description',
                        message: 'Please enter Description'
                        }
                    }
                },
            }
        });
        $('#edit_advertiesment_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            advertiesment_name: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_name',
                        message: 'Please enter Advertiesment Name'
                    }
                }
            },
            advertiesment_height: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_height',
                        message: 'Please enter Advertiesment Height'
                    }
                }
            },
            advertiesment_width: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_width',
                        message: 'Please enter Advertiesment Width'
                    }
                }
            },
            advertiesment_amount: {
                validators: {
                    notEmpty: {
                        field: 'advertiesment_amount',
                        message: 'Please enter Advertiesment Amount'
                    }
                }
            },
            category_type: {
                validators: {
                    notEmpty: {
                        field: 'category_type',
                        message: 'Please select Type'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        field: 'description',
                        message: 'Please enter Description'
                    }
                }
            },
        }
    });
        $('#add_advertiesment_submit').bind('click', function(e) {

          var form_data = $("#add_advertiesment_form").serialize();
              
            $.ajax({
                url: base_url+"/advertiesment/addAdvertiesment/",
                method: "post",
                data: form_data,
                success: function(result){                    
                    var content = '<small id="advertiesment-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#advertiesment-add-help-block").remove();
                    $("#message_block_advertiesment_add").html(content);
                        if(result == "Advertiesment added Successfully")
                        {
                            $("#add_advertiesment_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#advertiesment-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });


        $('#edit_advertiesment_submit').bind('click', function(e) {

          var form_data = $("#edit_advertiesment_form").serialize();
              
            $.ajax({
                url: base_url+"/advertiesment/updateAdvertiesment/",
                method: "post",
                data: form_data,                
                success: function(result){                    
                    var content = '<small id="advertiesment-edit-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#advertiesment-edit-help-block").remove();
                    $("#message_block_advertiesment_edit").html(content);
                        if(result == "Advertiesment updated Successfully")
                        {
                            $("#edit_advertiesment_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#advertiesment-edit-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });


    /* END: Add/Edit Advertiesment
    */ 


    
});
/* END: Advertiesment Updation
*/