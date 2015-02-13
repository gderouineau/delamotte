jQuery(window).load(function() { 
"use strict";
    jQuery("#status").fadeOut(350); // will first fade out the loading animation
    jQuery("#preloader").delay(350).fadeOut(200); // will fade out the white DIV that covers the website.
    (function(){
        var body = $('body');
        var id = parseInt(body.attr('data-showphoto'));
        var id_max = parseInt(body.attr('data-showphotomax'));
        for(var i = (id+1) ; i<= id_max; i++ ){
            var bloc = $('.bloc-'+i);
            //bloc.style.display = "none";
            bloc.each(function(){
               var $el = $(this);
               $el.hide();
               $el.css("display", "none");
            });
            $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
        }
    })();

});
