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


/* START: Customer Profile Form Validation
*/
$(document).ready(function() {
    $('#customer_profile_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            first_name: {
                validators: {
                    notEmpty: {
                        field: 'first_name',
                        message: 'Please enter First Name'
                    }
                }
            },
            mobile_no: {
                validators: {
                    notEmpty: {
                        field: 'mobile_no',
                        message: 'Please enter Phone Number'
                    },
                    integer: {
                        message: 'Please enter digits only'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Only 10 digits allowed'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        field: 'last_name',
                        message: 'Please enter Last Name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        field: 'email',
                        message: 'Please enter Email'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            address_line_1: {
                validators: {
                    notEmpty: {
                        field: 'address_line_1',
                        message: 'Please enter Address'
                    }
                }
            },
            address_line_2: {
                validators: {
                    notEmpty: {
                        field: 'address_line_2',
                        message: 'Please enter Street Address'
                    }
                }
            },
            country_id: {
                validators: {
                    notEmpty: {
                        field: 'country_id',
                        message: 'Please select Country'
                    }
                }
            },
            city_id: {
                validators: {
                    notEmpty: {
                        field: 'city_id',
                        message: 'Please select City'
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
            zip_code: {
                validators: {
                    notEmpty: {
                        field: 'zip_code',
                        message: 'Please enter Pincode'
                    }
                }
            },
            paypal_email_id: {
                validators: {                    
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },            
        }
    });

    /* START: Customer Profile Form Check Email Exists or Not
    */
        $('#customer_profile_email').bind("blur",function(){
            
            var email = $(this).val();
            
            $.ajax({
                url: base_url+"/customer_profile/checkEmailExist/",
                method: "post",
                data: "email="+email,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="email-help-block" style="display: inline-block;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID">The email address is already exist</small>';
                    if(result)
                    {
                        $("#email-help-block").remove();
                        $(content).insertAfter("#customer_profile_email");
                        $("#customer_profile_email").val("");
                    }                    
                    //alert(result);
                }
            });

        });

    /* END: Customer Profile Form Check Email Exists or Not
    */  

    /* START: Customer Profile Form Submit
    */
        $('#customer_profile_submit').bind("click",function(){
            
            var form_data = $("#customer_profile_form").serialize();
            
            $.ajax({
                url: base_url+"/customer_profile/customerProfileUpdate/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="customer-profile-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#customer-profile-form-help-block").remove();                    
                    $("#message_block").html(content);
                        if(result == "Customer Profile Updated Successfully")
                        {
                            location.reload();
                        }
                        else
                        {                            
                            $("#customer-profile-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Customer Profile Form Submit
    */  

    /* START: Customer Profile Form Get State Based on Country Selection
    */
        $('#country_id').change(function(){       

            var country_id = $(this).val();
            if(country_id == "")            
            {
             country_id = 0;   
            }

            $.ajax({
                url: base_url+"/customer_profile/getStatesByCountry/",
                method: "post",
                data: "country_id="+country_id,
                success: function(result){                    
                    $("#state_id").html(result);
                    //alert(result);
                    var city_html = '<option value="">Select City*</option>';
                    if(country_id == 0)
                    {
                    $("#city_id").html(city_html);
                    }
                }
            });

        });

    /* END: Customer Profile Form Get State Based on Country Selection
    */

    /* START: Customer Profile Form Get City Based on Country and State Selection
    */
        $('#state_id').change(function(){       

            var country_id = $('#country_id').val();
            var state_id = $(this).val();

            if(country_id == "")
            {
             country_id = 0;
            }
            if(state_id == "")
            {
             state_id = 0;
            }

            $.ajax({
                url: base_url+"/customer_profile/getCitiesByState/",
                method: "post",
                data: "country_id="+country_id+"&state_id="+state_id,
                success: function(result){                    
                    $("#city_id").html(result);
                    //alert(result);
                }
            });

        });

    /* END: Customer Profile Form Get City Based on Country and State Selection
    */ 
    
});
/* END: Customer Profile Form Validation
*/