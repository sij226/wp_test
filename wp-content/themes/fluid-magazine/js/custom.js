jQuery(document).ready(function($){
        
    $('.banner').imagesLoaded( function() {
        var mns = "sticky";

        var hdr = $('.banner').height();
        mn = $(".site-header .header-t");
        var h = mn.height();
        $(window).scroll(function() {
            if( $(this).scrollTop() > hdr ) {
                mn.addClass(mns);
                 $('.sticky-holder').css('height', h);    
                    } else {
                mn.removeClass(mns);
                 $('.sticky-holder').css('height', 0);    
            }
        });
    });
     
    /** Variables from Customizer for Slider settings */
    if( fluid_magazine_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }

    if( fluid_magazine_data.animation == "slide" ){
        var slider_animation = false;
    }else{
        var slider_animation = "fade";
    }


    $("#banner-slider").owlCarousel({
        // items : 1,
        singleItem : true,
        //Autoplay
        autoPlay : slider_auto,
        stopOnHover : true,
        // Navigation
        navigation : true,
        navigationText : ["prev","next"],
        rewindNav : true,
        scrollPerPage : false,
        //Pagination
        pagination : false,
        //Lazy load
        lazyLoad : true,
        mouseDrag : false,
        slideSpeed :  fluid_magazine_data.speed,  
        paginationSpeed :  fluid_magazine_data.a_speed,
        transitionStyle : slider_animation

   });
   
    $('.post-slider').flexslider({
        animation: "slide",
        smoothHeight: true,
        slideshow: false
    });

    $(".btn-down").click(function() {
        $('html, body').animate({
            scrollTop: $("#next-section").offset().top
        }, 1000);
    });

    if( ( $('.page-template-template-home').length > 0 ) || ( $('.archive').length > 0 ) ){        
        $('.featured-post').imagesLoaded(function(){ 
            $('.featured-post').masonry({
        		itemSelector: '.post',
        		columnWidth: '.grid-sizer',
                percentPosition: true
        	});
        });
    };

    $('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#site-navigation',
        side: 'right'
    });

    // search form
    $('html').click(function() {
        $('.form-holder').hide(); 
    });

    $('.form-holder').click(function(event){
        event.stopPropagation();
    });
    $(".btn-search").click(function(){
        $(".form-holder").slideToggle();
        return false;
    });

    /* Equal Height */
    $('.top-stories .col .text-holder .entry-content').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

});