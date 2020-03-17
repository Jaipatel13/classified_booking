/* START: Get Base URL
*/
    var base_url = window.location.origin;
    base_url += "/classified_booking";
    
    // "http://test.com"

    var host = window.location.host;    
    // test.com

    var pathArray = window.location.pathname.split( '/' );    
    // ["", "questions", "12345678", "get-the-base-url-in-javascript"]
/* END: Get Base URL
*/

    var currency_symbol = "$";


/* START: Generate Order Form Validation
*/
$(document).ready(function() {
    $('#generate_order_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            pickup_location: {
                validators: {
                    notEmpty: {
                        field: 'pickup_location',
                        message: 'Please enter Pickup Location'
                    }
                }
            },            
            pickup_time_deadline: {
                validators: {
                    notEmpty: {
                        field: 'pickup_time_deadline',
                        message: 'Please enter Pickup Time Deadline'
                    }
                }
            },
            contact_person: {
                validators: {
                    notEmpty: {
                        field: 'contact_person',
                        message: 'Please enter Contact Person'
                    }
                }
            },
            package_size: {
                validators: {
                    notEmpty: {
                        field: 'package_size',
                        message: 'Please enter Package Size'
                    }
                }
            },
            package_weight: {
                validators: {
                    notEmpty: {
                        field: 'package_weight',
                        message: 'Please enter Package Weight'
                    }
                }
            },
            package_description: {
                validators: {
                    notEmpty: {
                        field: 'package_description',
                        message: 'Please enter Package Description'
                    }
                }
            },
            delivered_to_location: {
                validators: {
                    notEmpty: {
                        field: 'delivered_to_location',
                        message: 'Please enter Delivered to Location'
                    }
                }
            },
            delivered_to_recipient_name: {
                validators: {
                    notEmpty: {
                        field: 'delivered_to_recipient_name',
                        message: 'Please enter Delivered to Recipient Name'
                    }
                }
            },
            dropoff_time_deadline: {
                validators: {
                    notEmpty: {
                        field: 'dropoff_time_deadline',
                        message: 'Please select Dropoff Time Deadline'
                    }
                }
            },            
        }
    });
  

    /* START: Generate Order Form Check Email Exists or Not
    */
        $('#pickup_location').bind("blur",function(){
            
            var pickup_location = $(this).val();
            var delivered_to_location = $("#delivered_to_location").val();

            if( (pickup_location != "") && (delivered_to_location != "") )
            {
                $.ajax({
                    url: base_url+"/generate_order/getDMAPIDetails/",
                    method: "post",
                    data: "pickup_location="+pickup_location+"&delivered_to_location="+delivered_to_location,
                    success: function(result){
                        var res = $.parseJSON ( result );
                        distance_text = res.distance_text;
                        duration_text = res.duration_text;                        
                        total_amount = res.total_amount;
                        total_amount_text = total_amount+" "+currency_symbol;
                        status = res.status;
                        all_fields_required = res.all_fields_required;                        

                        if(all_fields_required == "All fields are required")
                        {
                            var content = '<small id="pickup-location-help-block" style="display: block;" class="help-block" data-bv-validator="notEmpty" data-bv-for="pickup_location" data-bv-result="INVALID">Pickup Location and Delivered to Location are required to get Delivery Total Distance, Delivery Total Duration, Order Amount details</small>';
                            if(all_fields_required)
                            {
                                $("#pickup-location-help-block").remove();
                                $(content).insertAfter("#pickup_location");

                                $("#delivery_total_distance_text").html("");
                                $("#delivery_total_distance").val("");

                                $("#delivery_total_duration_text").html("");
                                $("#delivery_total_duration").val("");
                                
                                $("#order_amount_text").html("");
                                $("#order_amount").val("");
                            }
                        }
                        else
                        {
                            $("#delivery_total_distance_text").html(distance_text);
                            $("#delivery_total_distance").val(distance_text);

                            $("#delivery_total_duration_text").html(duration_text);
                            $("#delivery_total_duration").val(duration_text);
                            
                            $("#order_amount_text").html(total_amount_text);
                            $("#order_amount").val(total_amount);
                        }
                    }
                });
            }
            else
            {
                var content = '<small id="pickup-location-help-block" style="display: block;" class="help-block" data-bv-validator="notEmpty" data-bv-for="pickup_location" data-bv-result="INVALID">Pickup Location and Delivered to Location are required to get Delivery Total Distance, Delivery Total Duration, Order Amount details</small>';                
                $("#pickup-location-help-block").remove();
                $(content).insertAfter("#pickup_location");

                $("#delivery_total_distance_text").html("");
                $("#delivery_total_distance").val("");

                $("#delivery_total_duration_text").html("");
                $("#delivery_total_duration").val("");
                
                $("#order_amount_text").html("");
                $("#order_amount").val("");
            }

        });

        $('#delivered_to_location').bind("blur",function(){
            
            var pickup_location = $("#pickup_location").val();
            var delivered_to_location = $(this).val();           

            if( (pickup_location != "") && (delivered_to_location != "") )
            {
                $.ajax({
                    url: base_url+"/generate_order/getDMAPIDetails/",
                    method: "post",
                    data: "pickup_location="+pickup_location+"&delivered_to_location="+delivered_to_location,
                    success: function(result){
                        var res = $.parseJSON ( result );
                        distance_text = res.distance_text;
                        duration_text = res.duration_text;
                        total_amount = res.total_amount;
                        total_amount_text = total_amount+" "+currency_symbol;
                        status = res.status;
                        all_fields_required = res.all_fields_required;                        

                        if(all_fields_required == "All fields are required")
                        {
                            var content = '<small id="delivered-to-location-help-block" style="display: block;" class="help-block" data-bv-validator="notEmpty" data-bv-for="pickup_location" data-bv-result="INVALID">Pickup Location and Delivered to Location are required to get Delivery Total Distance, Delivery Total Duration, Order Amount details</small>';
                            if(all_fields_required)
                            {
                                $("#delivered-to-location-help-block").remove();
                                $(content).insertAfter("#delivered_to_location");

                                $("#delivery_total_distance_text").html("");
                                $("#delivery_total_distance").val("");

                                $("#delivery_total_duration_text").html("");
                                $("#delivery_total_duration").val("");
                                
                                $("#order_amount_text").html("");
                                $("#order_amount").val("");
                            }
                        }
                        else
                        {
                            $("#delivery_total_distance_text").html(distance_text);
                            $("#delivery_total_distance").val(distance_text);

                            $("#delivery_total_duration_text").html(duration_text);
                            $("#delivery_total_duration").val(duration_text);
                            
                            $("#order_amount_text").html(total_amount_text);
                            $("#order_amount").val(total_amount);
                        }
                    }
                });
            }
            else
            {
                var content = '<small id="delivered-to-location-help-block" style="display: block;" class="help-block" data-bv-validator="notEmpty" data-bv-for="pickup_location" data-bv-result="INVALID">Pickup Location and Delivered to Location are required to get Delivery Total Distance, Delivery Total Duration, Order Amount details</small>';                
                $("#delivered-to-location-help-block").remove();
                $(content).insertAfter("#delivered_to_location");

                $("#delivery_total_distance_text").html("");
                $("#delivery_total_distance").val("");

                $("#delivery_total_duration_text").html("");
                $("#delivery_total_duration").val("");
                
                $("#order_amount_text").html("");
                $("#order_amount").val("");
            }

        });

    /* END: Generate Order Form Check Email Exists or Not
    */ 

    /* START: Generate Order Form Submit
    */
        $('#generate_order_submit').bind("click",function(){
            
            var form_data = $("#generate_order_form").serialize();
            
            $.ajax({
                url: base_url+"/generate_order/generateOrder/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="generate-order-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#generate-order-form-help-block").remove();
                    $(content).insertAfter("#generate_order_reset");
                        if(result == "Order Generated Successfully")
                        {   
                            $("#generate_order_reset").trigger("click");
                            setTimeout(function(){
                                window.location.reload(true);
                            },1000);                            
                        }
                        else
                        {                            
                            $("#generate-order-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Generate Order Form Submit
    */   
    
});
/* END: Generate Order Form Validation
*/