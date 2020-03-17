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

    /* START: Payment Receipt Print
    */
        $('#payment_receipt_print').bind("click",function(){
            
            var page_data = $(".cls_payment_receipt_page_row").html();
            //var page_data = true;
            
            $.ajax({
                url: base_url+"/payment_receipt/paymentReceiptLoad/",//userPaymentAdd
                method: "post",
                data: 'page_data='+page_data,
                success: function(result){
                    //$("#email").html(result);                    
                    /*var content = '<small id="user-payment-form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#user-payment-form-help-block").remove();
                    $(content).insertAfter("#user_payment_reset");
                        //if(result == "User Payment Added Successfully")
                        if(result == "Redirecting to Paypal")
                        {
                            $("#user_payment_reset").trigger("click");*/
                            setTimeout(function(){
                                //window.location.reload(true);
                                window.location.href = base_url+"/payment_receipt/paymentReceiptPDF";
                            },1000);/* 
                        }
                        else
                        {                            
                            //$("#user-payment-form-help-block").css("color","#a94442");
                            $("#user-payment-form-help-block").css({
                                'cssText': 'color: #a94442 !important'
                            });
                        }
                    }*/
                }
            });

        });

    /* END: Payment Receipt Print
    */
    
});
/* END: Payment Form Validation
*/