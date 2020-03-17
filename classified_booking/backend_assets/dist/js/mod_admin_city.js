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


/* START: City Updation
*/
$(document).ready(function() {

    /* START: City Form Get State Based on Country Selection
    */
        $('.cls_country_id > option').bind('click', function(e) {       

            var country_id = $(this).val();
            if(country_id == "")            
            {
             country_id = 0;   
            }

            $.ajax({
                url: base_url+"/city/getStatesByCountry/",
                method: "post",
                data: "country_id="+country_id,
                success: function(result){                    
                    $("#state_id").html(result);                    
                }
            });

        });

    /* END: City Form Get State Based on Country Selection
    */

    /* START: Delete City
    */
        $('.cls_delete_city').bind('click', function(e) {
          city_id = $(this).attr('data-city-id');
          e.preventDefault();
          $('#confirm-delete-'+city_id).modal({
              backdrop: 'static',
              keyboard: false
          })
          .on('click', '#delete', function(e) {
              
            $.ajax({
                url: base_url+"/city/deleteCity/",
                method: "post",
                data: "city_id="+city_id,
                dataType: 'json',
                success: function(result){                    
                    var content = '<small id="city-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                    
                    if(result.message)
                    {
                    $("#city-delete-help-block").remove();
                    $("#message_block_city_update").html(content);
                        if(result.message == "City deleted Successfully")
                        {
                            location.reload();
                        }
                        else
                        {                            
                            $("#city-delete-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });


            });
        });

    /* END: Delete City
    */  

    /* START: Edit City
    */
        $('.cls_edit_city').bind('click', function(e) {
          city_id = $(this).attr('data-city-id');
          country_id = $(this).attr('data-country-id');
          state_id = $(this).attr('data-state-id');
          city_name = $(this).attr('data-city-name');
              
            $.ajax({
                url: base_url+"/city/editCityFormLoad/",
                method: "post",
                data: "city_id="+city_id+"&country_id="+country_id+"&state_id="+state_id+"&city_name="+city_name,                
                success: function(result){
                    window.location.href = base_url+"/city/editCityForm";
                }
            });
            
        });

    /* END: Edit City
    */ 

    /* START: Update City Name Only
    */
        $('.cls_city_name').bind('blur', function(e) {
            city_id = $(this).attr('data-city-id');
            city_name = $(this).text();
              
            $.ajax({
                url: base_url+"/city/updateCityNameOnly/",
                method: "post",
                data: "city_id="+city_id+"&city_name="+city_name,
                success: function(result){                    
                    var content = '<small id="city-update-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#city-update-help-block").remove();
                    $("#message_block_city_update").html(content);
                        if(result == "City updated Successfully")
                        {
                            //location.reload();
                        }
                        else
                        {                            
                            $("#city-update-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });
    /* END: Update City Name Only
    */

    /* START: Add / Edit City
    */

        $('#add_city_form').bootstrapValidator({
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
            state_id: {
                validators: {
                    notEmpty: {
                        field: 'state_id',
                        message: 'Please select State'
                    }
                }
            },            
            city_name: {
                validators: {
                    notEmpty: {
                        field: 'city_name',
                        message: 'Please enter City Name'
                    }
                }
            },
        }
    });

        $('#edit_city_form').bootstrapValidator({
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
            state_id: {
                validators: {
                    notEmpty: {
                        field: 'state_id',
                        message: 'Please select State'
                    }
                }
            },            
            city_name: {
                validators: {
                    notEmpty: {
                        field: 'city_name',
                        message: 'Please enter City Name'
                    }
                }
            },
        }
    });

        $('#add_city_submit').bind('click', function(e) {

          var form_data = $("#add_city_form").serialize();
              
            $.ajax({
                url: base_url+"/city/addCity/",
                method: "post",
                data: form_data,                
                success: function(result){                    
                    var content = '<small id="city-add-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#city-add-help-block").remove();
                    $("#message_block_city_add").html(content);
                        if(result == "City added Successfully")
                        {
                            $("#add_city_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#city-add-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

        $('#edit_city_submit').bind('click', function(e) {

          var form_data = $("#edit_city_form").serialize();
              
            $.ajax({
                url: base_url+"/city/updateCity/",
                method: "post",
                data: form_data,                
                success: function(result){                    
                    var content = '<small id="city-edit-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#city-edit-help-block").remove();
                    $("#message_block_city_edit").html(content);
                        if(result == "City updated Successfully")
                        {
                            $("#edit_city_reset").trigger("click");
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }
                        else
                        {
                            $("#city-edit-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });
            
        });

    /* END: Add / Edit City
    */ 


    
});
/* END: City Updation
*/