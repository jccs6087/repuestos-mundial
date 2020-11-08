(function () {
    'use strict';	

	$( document ).ready(function(){        
        $('.spinner-cover').fadeOut('slow',function(){
            $(this).remove();
        });
    });

    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav: true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            500:{
                items:2
            },
            900:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    
}());