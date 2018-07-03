jQuery(document).ready(function($) {

    "use strict";
    
    /**
     * Slider script
     */
    $('.nv-slider-wrapper').each(function(){
        
        var Id = $(this).parent().attr('id');
        
        $('#'+Id+" .nvSlider").lightSlider({
            item:1,
            pager: false,
            loop: true,
            auto: true,
            speed: 2000,
            pause: 10000,
            slideMargin: 0,
            enableTouch: false,
            enableDrag: false,
            prevHtml: '<i class="fa fa-angle-left"></i>',
            nextHtml: '<i class="fa fa-angle-right"></i>',
            onSliderLoad: function() {
                $('.nvSlider').removeClass( 'cS-hidden' );
            }
        });
    });
    
});