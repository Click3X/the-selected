jQuery(document).ready(function($) {
  // FORWARD DECLARE VARIABLES
    
    // CHARLES OUTLINE BUTTON
    // var outlines = $('<button/>', {'id':'outline', 'class':'outline-button', 'value': 'outlines'});
    // var stys = $('<style>#outline {position:fixed; z-index:1000; bottom:50px; right:50px; width:50px; height: 20px;} .outlines {outline:1px solid rgba(255, 0, 0, 0.3);}</style>');
    // $(outlines).appendTo('body');
    // $(stys).appendTo('head');
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