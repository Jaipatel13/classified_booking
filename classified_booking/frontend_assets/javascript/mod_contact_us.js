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


/* START: Contact Us Form Validation
*/
$(document).ready(function() {     

    /* START: Contact Us Form Submit
    */
        $('#contact_us_submit').bind("click",function(){
            
            var form_data = $("#contact_us_form").serialize();
            
            $.ajax({
                url: base_url+"/contact_us/sendContact/",
                method: "post",
                data: form_data,
                success: function(result){

                    //$("#email").html(result);                    
                    var content = '<small id="form-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result+'</small>';
                    
                    if(result)
                    {
                    $("#form-help-block").remove();
                    $(content).insertAfter("#contact_us_reset");
                        if(result == "Email sent Successfully")
                        {   
                            $("#contact_us_reset").trigger("click");
                            setTimeout(function(){
                                window.location.href = base_url+"/contact_us";
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

    /* END: Contact Us Submit
    */   
    
});
/* END: Contact Us Validation
*/