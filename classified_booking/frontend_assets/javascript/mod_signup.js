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
    $('#signup_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            /*user_type: {
                validators: {
                    notEmpty: {
                        field: 'user_type',
                        message: 'Please select User Type'
                    }
                }
            },*/
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
            username: {
                validators: {
                    notEmpty: {
                        field: 'username',
                        message: 'Please enter Username'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        field: 'password',
                        message: 'Please enter Password'
                    },
                    stringLength: {
                        min: 8,                        
                        message: 'Minimum 8 characters required'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        field: 'confirm_password',
                        message: 'Please enter Confirm Password'
                    },
                    stringLength: {
                        min: 8,                        
                        message: 'Minimum 8 characters required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
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
            terms_conditions: {
                validators: {
                    notEmpty: {
                        field: 'terms_conditions',
                        message: 'Please accept terms and conditions'
                    }
                }
            },
        }
    });


    /* START: Signup Form Get State Based on Country Selection
    */
        $('#country_id').change(function(){       

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

    /* END: Signup Form Get State Based on Country Selection
    */

    /* START: Signup Form Get City Based on Country and State Selection
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
                url: base_url+"/signup/getCitiesByState/",
                method: "post",
                data: "country_id="+country_id+"&state_id="+state_id,
                success: function(result){                    
                    $("#city_id").html(result);
                    //alert(result);
                }
            });

        });

    /* END: Signup Form Get City Based on Country and State Selection
    */

    /* START: Signup Form Check Email Exists or Not
    */
        $('#email').bind("blur",function(){
            
            var email = $(this).val();
            
            $.ajax({
                url: base_url+"/signup/checkEmailExist/",
                method: "post",
                data: "email="+email,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="email-help-block" style="display: block;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID">The email address is already exist</small>';
                    if(result)
                    {
                    $("#email-help-block").remove();
                    $(content).insertAfter("#email");
                    $("#email").val("");
                    }                    
                    //alert(result);
                }
            });

        });

    /* END: Signup Form Check Email Exists or Not
    */  

    /* START: Signup Form Check Username Exists or Not
    */
        $('#username').bind("blur",function(){
            
            var username = $(this).val();
            
            $.ajax({
                url: base_url+"/signup/checkUsernameExist/",
                method: "post",
                data: "username="+username,
                success: function(result){
                    //$("#username").html(result);                    
                    var content = '<small id="username-help-block" style="display: block;" class="help-block" data-bv-validator="notEmpty" data-bv-for="username" data-bv-result="INVALID">The username is already exist</small>';
                    if(result)
                    {
                    $("#username-help-block").remove();
                    $(content).insertAfter("#username");
                    $("#username").val("");
                    }                    
                    //alert(result);
                }
            });

        });

    /* END: Signup Form Check Username Exists or Not
    */

    /* START: Signup Form Submit
    */
        $('#submit').bind("click",function(){
            
            var form_data = $("#signup_form").serialize();
            
            $.ajax({
                url: base_url+"/signup/signupAdd/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    var city_content = '<option value="">Select City*</option>';
                    var state_content = '<option value="">Select State*</option>';
                    if(result)
                    {
                    $("#form-help-block").remove();
                    $(content).insertAfter("#reset");
                        if(result == "Signup Completed Successfully")
                        {   
                            $("#reset").trigger("click");
                            $("#city_id").html(city_content);
                            $("#state_id").html(state_content);
                            setTimeout(function(){
                                window.location.href = base_url+"/login";
                            },1000);
                        }
                        else
                        {
                            //$("#form-help-block").css("color","#3aa1e3");
                            $("#form-help-block").css("color","#a94442");
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