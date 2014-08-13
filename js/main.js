jQuery(document).ready(function($) {
  // FORWARD DECLARE VARIABLES
    
    // CHARLES OUTLINE BUTTON
    var outlines = $('<button/>', {'id':'outline', 'class':'outline-button', 'value': 'outlines'});
    $(outlines).appendTo('body');
    $(outlines).click(function () {
      $('*').toggleClass('outlines');
    });

});