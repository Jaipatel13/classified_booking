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
/* START: Get Common Values
*/
    var payment_type_credit_debit_card = 'credit_debit_card';
    var stripe_publishable_key = 'pk_test_J6z62RCftCUV25nlwoow5OLU00SKdK9N2T';
/* END: Get Common Values
*/


/* START: Stripe Payment Function
*/
    //Stripe.setPublishableKey(stripe_publishable_key);
    //callback to handle the response from stripe
    function stripeResponseHandler(status, response)
    {        
        var form$ = $("#user_payment_form");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");

        //Submit Form
        var form_data = $("#user_payment_form").serialize();
            
            $.ajax({
                url: base_url+"/user_payment/userPaymentFormSubmit/",//userPaymentAdd
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="user-payment-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#user-payment-form-help-block").remove();
                    $(content).insertAfter("#user_payment_reset");
                        //if(result == "User Payment Added Successfully")
                        if(result == "Redirecting to Paypal")
                        {
                            $("#user_payment_reset").trigger("click");
                            setTimeout(function(){
                                //window.location.reload(true);
                                window.location.href = base_url+"/user_payment/paypalBuy";
                            },1000); 
                        }
                        else if(result == "Payment Done Successfully")
                        {   
                            $("#user_payment_reset").trigger("click");
                            $("#user-payment-form-help-block").css({
                                'cssText': 'color: #13931e !important'
                            });
                        }
                        else
                        {   
                            //$("#user-payment-form-help-block").css("color","#a94442");
                            $("#user-payment-form-help-block").css({
                                'cssText': 'color: #a94442 !important'
                            });
                        }
                    }
                }
            });
            return;

    }    
/* END: Stripe Payment Function
*/

/* START: Payment Form Validation
*/
$(document).ready(function() {
    $('#user_payment_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            paypal_email: {
                validators: {
                    /*notEmpty: {
                        field: 'email',
                        message: 'Please enter Email'
                    },*/
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },     
            stripe_email: {
                validators: {                    
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },       
        }
    });  

    /* START: Payment Form Submit
    */
        $('#user_payment_submit').bind("click",function(){
            
            payment_type = $('input[name=payment_type]:checked').val();
            if(payment_type == payment_type_credit_debit_card)
            {
                stripe_card_no = $('#stripe_card_no').val();
                stripe_card_cvc = $('#stripe_card_cvc').val();
                stripe_card_expiry_month = $('#stripe_card_expiry_month').val();
                stripe_card_expiry_year = $('#stripe_card_expiry_year').val();
                if( (stripe_card_no!="" && stripe_card_no!='undefined')
                    && (stripe_card_cvc!="" && stripe_card_cvc!='undefined')
                    && (stripe_card_expiry_month!="" && stripe_card_expiry_month!='undefined')
                    && (stripe_card_expiry_year!="" && stripe_card_expiry_year!='undefined')
                  )
                {
                    Stripe.setPublishableKey(stripe_publishable_key);          
                    //create single-use token to charge the user
                    Stripe.createToken({
                        number: $('#stripe_card_no').val(),
                        cvc: $('#stripe_card_cvc').val(),
                        exp_month: $('#stripe_card_expiry_month').val(),
                        exp_year: $('#stripe_card_expiry_year').val()
                    }, stripeResponseHandler);
                }
            }

            var form_data = $("#user_payment_form").serialize();
            
            $.ajax({
                url: base_url+"/user_payment/userPaymentFormSubmit/",//userPaymentAdd
                method: "post",
                data: form_data,
                success: function(result){
                    //$("#email").html(result);                    
                    var content = '<small id="user-payment-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#user-payment-form-help-block").remove();
                    $(content).insertAfter("#user_payment_reset");
                        //if(result == "User Payment Added Successfully")
                        if(result == "Redirecting to Paypal")
                        {
                            $("#user_payment_reset").trigger("click");
                            setTimeout(function(){
                                //window.location.reload(true);
                                window.location.href = base_url+"/user_payment/paypalBuy";
                            },1000); 
                        }
                        else if(result == "Payment Done Successfully")
                        {   
                            $("#user_payment_reset").trigger("click");
                            $("#user-payment-form-help-block").css({
                                'cssText': 'color: #13931e !important'
                            });
                        }
                        else
                        {   
                            //$("#user-payment-form-help-block").css("color","#a94442");
                            $("#user-payment-form-help-block").css({
                                'cssText': 'color: #a94442 !important'
                            });
                        }
                    }
                }
            });

        });

    /* END: Payment Form Submit
    */
    
});
/* END: Payment Form Validation
*/