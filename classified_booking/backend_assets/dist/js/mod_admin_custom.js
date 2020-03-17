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

/* START: Do not allow to press enter on form
*/
    //$(window).keydown(function(event){
    $(document).on("keydown", ":input:not(textarea):not(:submit):not(:button):not(:reset)", function(event) {
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });  
/* END: Do not allow to press enter on form
*/




