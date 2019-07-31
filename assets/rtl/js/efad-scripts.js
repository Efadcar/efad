/* ------------------------------------------------
  Project:   Efad
------------------------------------------------ */
  



(function(jQuery) {

"use strict";


var  body = jQuery("body"),
main_menu = jQuery("#mainMenu");
	
	
	  

/*------------------------------------
  HT PreLoader
--------------------------------------*/
function preloader() {
   jQuery("#load").fadeOut();
   jQuery('#ht-preloader').delay(0).fadeOut('slow');
};
function perfectScrollbar() {
  
};


 /*------------------------------------
  HT Fixed Header
--------------------------------------*/
function fxheader() {
  jQuery(window).on('scroll', function () {
    if (jQuery(window).scrollTop() >= 10) {
      jQuery('.navbar-expand-lg').addClass('fixed-header');
    } else {
      jQuery('.navbar-expand-lg').removeClass('fixed-header');
    }
  });
};
 /*------------------------------------
scroll
--------------------------------------*/
$('.scroll-top').hide();

$(window).scroll(function () {

    if ($(this).scrollTop() > 100) {

        $('.scroll-top').fadeIn();

    } else {
        $('.scroll-top').fadeOut();
    }
});

$('.scroll-top').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 500);
    return false;
});

    /*------------------------------------
   mobile menu
   --------------------------------------*/
main_menu.on("show.bs.collapse", function() {
        body.addClass("menu-opened"), setTimeout(function() {
           
        }, 500)
    }), 
		
		main_menu.on("hide.bs.collapse", function() {
        body.removeClass("menu-opened"),  main_menu.find(".navbar-nav").removeClass("ps")
    })	

/*------------------------------------
  MatchHeight

    function MatchHeight() {
      $('.match').matchHeight({})
      ;
    }
    --------------------------------------*/
  
/*------------------------------------
  HT Window load and functions
--------------------------------------*/





jQuery(window).on('load', function() {
    preloader();
  fxheader();
  //MatchHeight();

	
	

});


  

  })(jQuery);