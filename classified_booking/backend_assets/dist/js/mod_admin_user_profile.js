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
        }
    });

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
                    var content = '<small id="email-help-block" style="display: inline-block;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID">The email address is already exist</small>';
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
                    $("#message_block").html(content);
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