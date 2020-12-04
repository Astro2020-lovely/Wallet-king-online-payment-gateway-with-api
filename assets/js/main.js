(function ($) {
	"use strict";

    jQuery(document).ready(function($){

    	$(".testimonial-section").owlCarousel({
		    items: 1,
		    autoplay: 3000,
		    margin: 60,
			loop: true,
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		    smartSpeed: 800
		});

        /*  Slick Nav Mobile menu  */
	   $('#menuResponsive').slicknav({
		   prependTo: "#mobile-menu-wrap",
		   allowParentLinks : false,
		   label: ''	
	   });
	   
		$(".slicknav_btn").on('click', function() {
		  if ( $(this).hasClass("slicknav_collapsed")) {
			$(".slicknav_icon").html('<i class="fa fa-bars"></i>');
		  } else {
			$(".slicknav_icon").html('<i class="fa fa-times"></i>');
		  }
		});

       $(window).bind('scroll', function() {
        var navHeight = $(".header-top-area").height();
        ($(window).scrollTop() > navHeight) ? $('.header-area-wrapper').addClass('goToTop') : $('.header-area-wrapper').removeClass('goToTop');
    	});


       $(".blog-area-slider").owlCarousel({
	    items: 3,
	    autoplay: false,
	    margin: 60,
		loop: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	    smartSpeed: 800,
	    responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			992 : {
				items: 3
			}
		}
	});	

    /*  Masonary Active  */
	$(".gallery-menu li").on('click', function() {
		$(".gallery-menu li").removeClass("active");
		$(this).addClass("active");   
		var selector = $(this).attr('data-filter');        
			$(".gallery-list").isotope({
				filter : selector,
			});
		});
    
		$(".gallery-list").isotope();

		/*  Counter Active  */
		$(".counter-number").counterUp({
			delay: 10,
        	time: 1000
		});

		/*  Image popUp  */
		 $('.image-popup').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-img-mobile',
			image: {
				verticalFit: true
			}
		});

		
		new WOW().init();

    });


    $(window).load(function(){
        setTimeout(function(){
            $('#cover').fadeOut(100);
        },500)
    });

    $(document).ready(function() {


        if ($(window).scrollTop() > 120) {
            $('#nav_bar').addClass('navbar-fixed-top');
            $('.go-top').show();
        }
        if ($(window).scrollTop() < 121) {
            $('#nav_bar').removeClass('navbar-fixed-top');
            $('.go-top').hide();
        }


        $(window).scroll(function () {
            //console.log($(window).scrollTop())
            if ($(window).scrollTop() > 120) {
                $('#nav_bar').addClass('navbar-fixed-top');
                $('.go-top').show();
            }
            if ($(window).scrollTop() < 121) {
                $('#nav_bar').removeClass('navbar-fixed-top');
                $('.go-top').hide();
            }
        });
    });

    $('#gtop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });


    jQuery(window).load(function(){

        
    });


}(jQuery));	