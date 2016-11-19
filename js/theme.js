jQuery.fn.exists = function () {
    return this.length !== 0;
}

jQuery(document).ready(function($){
    //Preloader
    jQuery(window).load(function() {
        preloaderFadeOutTime = 500;
        function hidePreloader() {
            var preloader = jQuery('.preloader');
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
    });
    
    $('ul.tabs').tabs();
    
    $(".button-collapse").sideNav();
    
    
    
     jQuery(window).on('load resize', function() {
        console.log('resize');
        var viewportWidth = $(window).width();
        var viewportHeight = $(window).height();
        var breadcrumb = $('.breadcrumb-list .col > span:last-child .breadcrumb');
         
        if ( viewportWidth < 601 ) {
            $('.blogpost').removeClass('horizontal');
            breadcrumb.addClass('truncate');
            
            
        } else {
            $('.blogpost').addClass('horizontal');
            breadcrumb.removeClass('truncate');
        }
    });
    
});