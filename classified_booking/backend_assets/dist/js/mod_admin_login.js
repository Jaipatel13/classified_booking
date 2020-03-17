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


/* START: Login Form Validation
*/  
    $(document).ready(function() {
    $('#login_form').bootstrapValidator({
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
            password: {
                validators: {
                    notEmpty: {
                        field: 'password',
                        message: 'Please enter Password'
                    },                    
                }
            },            
        }
    });

    /* START: Login Form Submit
    */
        $('#login_submit').bind("click",function(){
            
            var form_data = $("#login_form").serialize();
            
            $.ajax({
                url: base_url+"/loginCheck/",
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="login-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    if(result)
                    {
                    $("#login-form-help-block").remove();
                    $("#message_block").html(content);
                        if(result == "Logged in Successfully")
                        {   
                            $("#login_reset").trigger("click");
                            setTimeout(function(){
                                //window.location.href = base_url+"/dashboard";
                                window.location.href = base_url+"/user_profile";
                            },1000);                            
                        }
                        else
                        {
                            //$("#login-form-help-block").css("color","#3aa1e3");
                            $("#login-form-help-block").css("color","#a94442");
                        }
                    }                    
                }
            });

        });

    /* END: Login Form Submit
    */ 

});    
/* END: Login Form Validation
*/