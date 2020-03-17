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


/* START: Password Reset Form Validation
*/
$(document).ready(function() {
    $('#password_reset_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            current_password: {
                validators: {
                    notEmpty: {
                        field: 'current_password',
                        message: 'Please enter Current Password'
                    },
                    stringLength: {
                        min: 8,                        
                        message: 'Minimum 8 characters required'
                    },                    
                }
            },            
            password: {
                validators: {
                    notEmpty: {
                        field: 'password',
                        message: 'Please enter New Password'
                    },
                    stringLength: {
                        min: 8,                        
                        message: 'Minimum 8 characters required'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The new password and its confirm are not the same'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        field: 'confirm_password',
                        message: 'Please enter Confirm New Password'
                    },
                    stringLength: {
                        min: 8,                        
                        message: 'Minimum 8 characters required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The new password and its confirm are not the same'
                    }
                }
            },            
        }
    });

    /* START: Password Reset Form Submit
    */
        $('#password_reset_submit').bind("click",function(){
            
            var form_data = $("#password_reset_form").serialize();
            
            $.ajax({
                url: base_url+"/password_reset/userPasswordReset/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="password-reset-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#password-reset-form-help-block").remove();
                    $(content).insertAfter("#password_reset_reset");
                        if(result == "Password Changed Successfully")
                        {
                            setTimeout(function(){
                                window.location.href = base_url+"/login/logout";
                            },1000);
                        }
                        else
                        {                            
                            $("#password-reset-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Password Reset Form Submit
    */   
    
});
/* END: Password Reset Form Validation
*/