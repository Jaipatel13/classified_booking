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


/* START: Forgot Password Form Validation
*/  
    $(document).ready(function() {
    $('#forgot_password_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
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

    /* START: Forgot Password Form Submit
    */
        $('#forgot_password_submit').bind("click",function(){
            
            var form_data = $("#forgot_password_form").serialize();
            
            $.ajax({
                url: base_url+"/forgotPasswordSendEmail/",
                method: "post",
                data: form_data,
                success: function(result){                                        
                    var content = '<small id="forgot-password-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    if(result)
                    {
                    $("#forgot-password-form-help-block").remove();
                    $("#message_block").html(content);
                        if(result == "Email sent Successfully")
                        {   
                            $("#forgot_password_reset").trigger("click");
                            setTimeout(function(){
                                window.location.href = base_url+"/login";
                            },1000);                            
                        }
                        else
                        {                            
                            $("#forgot-password-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Forgot Password Form Submit
    */ 

});    
/* END: Forgot Password Form Validation
*/