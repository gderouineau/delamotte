jQuery(window).load(function($){
    "use strict";

    function eborLoadIsotope(){
        var $container = jQuery('#container'),
            isotopeOptions = {},
            defaultOptions = {
                filter: '.bienvenue',
                sortBy: 'original-order',
                sortAscending: true,
                layoutMode: 'masonry'
            };
        $container.isotope({
            itemSelector : '.element',
            resizable: false,
            masonry: { columnWidth: $container.width() / 12 }
        });

        jQuery(window).smartresize(function(){
            $container.isotope({
                masonry: { columnWidth: $container.width() / 12 }
            });
        });



        var $optionSets = jQuery('#options,#options-down').find('.option-set'),
            isOptionLinkClicked = false;




        function changeSelectedLink( $elem ) {

            //$elem.parents('.option-set').find('.selected').removeClass('selected');
            jQuery('#option-list-up,#option-list-down').find('.selected').removeClass('selected');
            $elem.addClass('selected');
        }

        $optionSets.find('a[href^="#filter"]').click(function(){
            var $this = jQuery(this);
            if ( $this.hasClass('selected') ) {
                return;
            }
            changeSelectedLink( $this );
            var href = $this.attr('href').replace( /^#/, '' ),
                option = jQuery.deparam( href, true );
            jQuery.extend( isotopeOptions, option );
            jQuery.bbq.pushState( isotopeOptions );
            isOptionLinkClicked = true;
            return false;
        });
        var hashChanged = false;
        jQuery(window).bind( 'hashchange', function( event ){
            var hashOptions = window.location.hash ? jQuery.deparam.fragment( window.location.hash, true ) : {},
                aniEngine = hashChanged ? 'best-available' : 'none',
                options = jQuery.extend( {}, defaultOptions, hashOptions, { animationEngine: aniEngine } );
            $container.isotope( options );
            isotopeOptions = hashOptions;
            if ( !isOptionLinkClicked ) {
                var hrefObj, hrefValue, $selectedLink;
                for ( var key in options ) {
                    hrefObj = {};
                    hrefObj[ key ] = options[ key ];
                    hrefValue = jQuery.param( hrefObj );
                    $selectedLink = $optionSets.find('a[href="#' + hrefValue + '"]');

                    changeSelectedLink( $selectedLink );
                }
            }
            isOptionLinkClicked = false;
            hashChanged = true;
        }).trigger('hashchange');


        var hash =window.location.hash;
        $optionSets.find('a[href="'+hash+'"]').addClass('selected');
        if(hash.length == 0){

            $optionSets.find('a[href="#filter=.bienvenue"]').addClass('selected');
        }
    }
    /**
     * CALL ISOTOPE DEPENDING ON FLEXSLIDER Existance
     */
    if ( jQuery('.flexslider')[0] ) {
        jQuery('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                eborLoadIsotope();
            }
        });
    } else {
        eborLoadIsotope();
    }
// jQuery('form').submit(function(){
    /*
    setTimeout(function(){
        $('#container').isotope('reLayout');
    }, 1000);
    */
// });
});