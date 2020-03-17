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

/* START: Code for Video JS - Home Page Slider
*/
    var video = document.getElementById("mp4");
    var spinner = document.getElementById("spinner");
    var delayMillis = 4000;
    var spinnerIsHere = 1;

    if ( (video != '' && video != null) && (spinner != '' && spinner != null) )
    {
        video.volume = 0;

        var playVid = setTimeout(function() {
          if(spinnerIsHere == 1) {
            // Delete element DOM
            // spinner.parentNode.removeChild(spinner);
            spinner.style.visibility = "hidden";
            spinnerIsHere = 0;
          }
          video.play();
        }, delayMillis);

        /*Start: For Video Loop*/
        video.addEventListener('timeupdate', timeupdate, false);

        function timeupdate() {
          /*var loopStart = parseFloat(document.getElementById('loopStart').value);
          var loopEnd = parseFloat(document.getElementById('loopEnd').value);
          var loopEnabled = document.getElementById('loopEnabled').checked;*/
          var loopStart = 0;
          var loopEnd = 594;
          var loopEnabled = true;

          if(loopEnabled){
            if (video.currentTime < loopStart || video.currentTime >= loopEnd ) {
              video.currentTime = loopStart;
            }
          }
        }
        /*End: For Video Loop*/

        video.addEventListener("click", function( event ) {
          if(video.paused) {
            if(spinnerIsHere == 1) {
              // Delete element DOM
              // spinner.parentNode.removeChild(spinner);
              spinner.style.visibility = "hidden";
              spinnerIsHere = 0;
            }
            clearTimeout(playVid);
            video.play();
          } else {
            video.pause();
            if(spinnerIsHere == 0) {
              spinner.style.visibility = "visible";
              spinnerIsHere = 1;
            }
          }
        }, false);

    }
/* END: Code for Video JS - Home Page Slider
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

/* START: Highlight main menu item on click
*/
$(document).ready(function() {

      // For Main menu items
      $('.cls_header_main_menu > li').each(function( index ) {
        if($(this).children().attr('href')==window.location.href){
          $(this).addClass('home');          
        }
        else
        {
          $(this).removeClass('home');
        }
      });

      //For Submenu items
      $('.cls_header_main_menu ul.submenu > li').each(function( index ) {
        if($(this).children().attr('href')==window.location.href){          
            $(this).css('background-color','#636363');          
        }
        else
        {
          
        }
      });  

});
/* END: Highlight main menu item on click
*/






