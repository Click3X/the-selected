jQuery(document).ready(function($) {
  // FORWARD DECLARE VARIABLES
    
    // CHARLES OUTLINE BUTTON
    // var outlines = $('<button/>', {'id':'outline', 'class':'outline-button', 'value': 'outlines'});
    // $(outlines).appendTo('body');
    // $(outlines).click(function () {
    //   $('*').toggleClass('outlines');
    //  });


    // SMOOTH SCROLL
    $(function() {
       $('a[href*=#]:not([href=#])').click(function() {
         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
           $('html,body').animate({
            scrollTop: target.offset().top
           }, 800);
           return false;
          }
         }
        });
      });
   });