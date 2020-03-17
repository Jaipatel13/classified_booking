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

    $(document).ready(function() {

    /* START: Payment Button Click
    */
        $('.cls_order_pay_now').bind("click",function(){
            
            var order_details_id = $(this).attr("data-order-id");
            var users_id = $(this).attr("data-user-id");
            var job_number = $(this).attr("data-job-number");
            var payment_amount = $(this).attr("data-payment-amount");
            
            $.ajax({
                url: base_url+"/user_payment/userPaymentFormLoad/",
                method: "post",
                data: "order_details_id="+order_details_id+"&users_id="+users_id+"&job_number="+job_number+"&payment_amount="+payment_amount,
                success: function(result){
                    //$("#email").html(result);                    
                    //var content = '<small id="user-payment-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    /*if(result)
                    {*/
                    /*$("#user-payment-form-help-block").remove();
                    $(content).insertAfter("#password_reset_reset");
                        if(result == "Password Changed Successfully")
                        {*/
                            setTimeout(function(){
                                window.location.href = base_url+"/user_payment";
                            },1000);
                        /*}
                        else
                        {                            
                            $("#user-payment-form-help-block").css("color","#a94442");
                        }*/
                    //}                    
                }
            });

        });

    /* END: Payment Button Click
    */  

    /* START: Payment Receipt Button Click
    */
        $('.cls_order_payment_receipt').bind("click",function(){
            
            var order_details_id = $(this).attr("data-order-id");
            var users_id = $(this).attr("data-user-id");
            var job_number = $(this).attr("data-job-number");
            var payment_amount = $(this).attr("data-payment-amount");
            
            $.ajax({
                url: base_url+"/payment_receipt/paymentReceiptPageLoad/",
                method: "post",
                data: "order_details_id="+order_details_id+"&users_id="+users_id+"&job_number="+job_number+"&payment_amount="+payment_amount,
                success: function(result){
                    //$("#email").html(result);                    
                    //var content = '<small id="payment-receipt-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    /*if(result)
                    {*/
                    /*$("#payment-receipt-form-help-block").remove();
                    $(content).insertAfter("#password_reset_reset");
                        if(result == "Password Changed Successfully")
                        {*/
                            setTimeout(function(){
                                window.location.href = base_url+"/payment_receipt";
                            },1000);
                        /*}
                        else
                        {                            
                            $("#payment-receipt-form-help-block").css("color","#a94442");
                        }*/
                    //}                    
                }
            });

        });

    /* END: Payment Receipt Button Click
    */ 
    
});
/* END: Password Reset Form Validation
*/