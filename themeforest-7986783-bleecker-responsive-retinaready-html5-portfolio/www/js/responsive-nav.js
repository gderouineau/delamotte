$.fn.slideFadeToggle  = function(speed, easing, callback) {
        return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};


jQuery(document).ready(function(){
	"use strict";
	
	jQuery('#nav-button').click(function() {
			jQuery('#options,#options-down').slideFadeToggle();
	});

    if ( jQuery(window).width() < 767){
        var up = jQuery('#option-list-up').html();
        var down = jQuery('#option-list-down').html();

        jQuery('#option-list-up').html(up+down);
    }

	if ( jQuery(window).width() < 767) {
	jQuery('#options li a').click(function() {
			jQuery('#options,#options-down').hide();
	});
	}
	
});	