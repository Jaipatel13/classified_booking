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


/* START: Signup Form Validation
*/
$(document).ready(function() {
    $('#user_profile_form').bootstrapValidator({
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
        }
    });


    /* START: Signup Form Get State Based on Country Selection
    */
        $('#user_profile_country_id').change(function(){       

            var country_id = $(this).val();
            if(country_id == "")            
            {
             country_id = 0;
            }

            $.ajax({
                url: base_url+"/signup/getStatesByCountry/",
                method: "post",
                data: "country_id="+country_id,
                success: function(result){                    
                    $("#user_profile_state_id").html(result);
                    //alert(result);
                    var city_html = '<option value="">Select City*</option>';
                    if(country_id == 0)
                    {
                    $("#user_profile_city_id").html(city_html);
                    }
                }
            });

        });

    /* END: Signup Form Get State Based on Country Selection
    */

    /* START: Signup Form Get City Based on Country and State Selection
    */
        $('#user_profile_state_id').change(function(){       

            var country_id = $('#user_profile_country_id').val();
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
                url: base_url+"/signup/getCitiesByState/",
                method: "post",
                data: "country_id="+country_id+"&state_id="+state_id,
                success: function(result){                    
                    $("#user_profile_city_id").html(result);
                    //alert(result);
                }
            });

        });

    /* END: Signup Form Get City Based on Country and State Selection
    */

    /* START: Signup Form Check Email Exists or Not
    */
        $('#user_profile_email').bind("blur",function(){
            
            var email = $(this).val();
            
            $.ajax({
                url: base_url+"/user_profile/checkEmailExist/",
                method: "post",
                data: "email="+email,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="email-help-block" style="display: block;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID">The email address is already exist</small>';
                    if(result)
                    {
                    $("#email-help-block").remove();
                    $(content).insertAfter("#user_profile_email");
                    $("#user_profile_email").val("");
                    }                    
                    //alert(result);
                }
            });

        });

    /* END: Signup Form Check Email Exists or Not
    */  

    /* START: Signup Form Submit
    */
        $('#user_profile_submit').bind("click",function(){
            
            var form_data = $("#user_profile_form").serialize();
            
            $.ajax({
                url: base_url+"/user_profile/userProfileUpdate/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="user-profile-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#user-profile-form-help-block").remove();
                    $(content).insertAfter("#user_profile_reset");
                        if(result == "User Profile Updated Successfully")
                        {
                        }
                        else
                        {                            
                            $("#user-profile-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Signup Form Submit
    */   
    
});
/* END: Signup Form Validation
*/