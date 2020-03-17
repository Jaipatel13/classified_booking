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


/* START: State Updation
*/
$(document).ready(function() {        

    /* START: Delete State
    */
        $('.cls_delete_state').bind('click', function(e) {
          state_id = $(this).attr('data-state-id');
          e.preventDefault();
          $('#confirm-delete-'+state_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/state/deleteState/",
                method: "post",
                data: "state_id="+state_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="state-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#state-delete-help-block").remove();
                    $("#message_block_state_update").html(content);
                        if(result.message == "State deleted Successfully")
                        {
                            location.reload();
                        }
                        else
                        {                            
                            $("#state-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete State
    */   

    /* START: Update State
    */
        $('.cls_state_name').bind('blur', function(e) {
            state_id = $(this).attr('data-state-id');
            state_name = $(this).text();
              
            $.ajax({
                url: base_url+"/state/updateState/",
                method: "post",
                data: "state_id="+state_id+"&state_name="+state_name,                
                success: function(result){                    
                    var content = '<small id="state-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#state-update-help-block").remove();
                    $("#message_block_state_update").html(content);
                        if(result == "State updated Successfully")
                        {
                            //location.reload();
                        }
                        else
                        {                            
                            $("#state-update-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: Update State
    */

    /* START: Display Country Dropdown
    */
        $('.cls_country_name').bind('click', function(e) {
            
            $("[id ^= country-dd-wrapper-id-]").html('');

            state_id = $(this).attr('data-state-id');
            country_id = $(this).attr('data-country-id');
            country_name = $(this).text();
              
            $.ajax({
                url: base_url+"/state/selectCountry/",
                method: "post",
                dataType: 'json',
                data: "state_id="+state_id+"&country_name="+country_name+"&country_id="+country_id,
                success: function(result){                    
                    var content = '<small id="country-select-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                        $("#country-select-help-block").remove();
                        $("#message_block_state_update").html(content);
                        if(result.ret_content)
                        {
                            $("#country-dd-wrapper-id-"+state_id).html(result.ret_content);

                            /* START: Update Country
                            */
                                $('.cls_select_country_dd > option').bind('click', function(e) {
                                    state_id_sel = $(this).attr('data-state-id');
                                    country_id_sel = $(this).val();                                    
                                    country_name_sel = $(this).attr('data-country-name');
                                      
                                    $.ajax({
                                        url: base_url+"/state/updateCountry/",
                                        method: "post",
                                        dataType: 'json',
                                        data: "state_id="+state_id_sel+"&country_id="+country_id_sel+"&country_name="+country_name_sel,
                                        success: function(result){                    
                                            var content = '<small id="state-country-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                                            
                                            if(result.message)
                                            {
                                                $("#state-country-update-help-block").remove();
                                                $("#message_block_state_update").html(content);
                                                if(result.message == "Country updated Successfully")
                                                {
                                                    location.reload();
                                                    /*$("#country-name-state-id-"+state_id).text(result.country_name);
                                                    $("#country-dd-wrapper-id-"+state_id).html('');*/
                                                }
                                                else
                                                {                            
                                                    $("#state-country-update-help-block").css("color","#a94442");
                                                }
                                            }
                                        }
                                    });
                                    
                                });
                            /* END: Update Country
                            */

                        } 
                        else
                        {
                            $("#country-select-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: Display Country Dropdown
    */

    /* START: Add State
    */

        $('#add_state_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            country_id: {
                validators: {
                    notEmpty: {
                        field: 'country_id',
                        message: 'Please select Country'
                    }
                }
            },            
            state_name: {
                validators: {
                    notEmpty: {
                        field: 'state_name',
                        message: 'Please enter State Name'
                    }
                }
            },
        }
    });

        $('#add_state_submit').bind('click', function(e) {

          var form_data = $("#add_state_form").serialize();
              
            $.ajax({
                url: base_url+"/state/addState/",
                method: "post",
                data: form_data,                
                success: function(result){                    
                    var content = '<small id="state-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#state-add-help-block").remove();
                    $("#message_block_state_add").html(content);
                        if(result == "State added Successfully")
                        {
                            $("#add_state_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#state-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Add State
    */ 


    
});
/* END: State Updation
*/