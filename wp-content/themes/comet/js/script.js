/* ==============================================
Revolution Slider Fullscreen
=============================================== */

jQuery(document).ready(function() {

    function parallax(){
      var scrolled = jQuery(window).scrollTop();
        jQuery('.hero').css('top',-(scrolled*0.0515)+'rem');
        jQuery('.home-container').css('bottom',-(scrolled*0.0515)+'rem');
        jQuery('.op-1,.op-2,.op-3').css('opacity',1-(scrolled*.00110));            
    };
	
    jQuery('.tp-banner').show().revolution( {
        dottedOverlay:"none",
        delay:16000,
        startwidth:1170,
        startheight:700,
        hideThumbs:200,
						
        thumbWidth:100,
        thumbHeight:50,
        thumbAmount:5,
		
        navigationType:"none",
        navigationArrows:"solo",
        navigationStyle:"preview4",

        touchenabled:"on",
        onHoverStop:"on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax:"mouse",
        parallaxBgFreeze:"on",
        parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

        keyboardNavigation:"off",

        navigationHAlign:"center",
        navigationVAlign:"bottom",
        navigationHOffset:0,
        navigationVOffset:20,

        soloArrowLeftHalign:"left",
        soloArrowLeftValign:"center",
        soloArrowLeftHOffset:20,
        soloArrowLeftVOffset:0,

        soloArrowRightHalign:"right",
        soloArrowRightValign:"center",
        soloArrowRightHOffset:20,
        soloArrowRightVOffset:0,

        shadow:0,
        fullWidth:"off",
        fullScreen:"on",

        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,

        shuffle:"off",

        autoHeight:"off",						
        forceFullWidth:"off",						

        hideThumbsOnMobile:"off",
        hideNavDelayOnMobile:1500,						
        hideBulletsOnMobile:"off",
        hideArrowsOnMobile:"off",
        hideThumbsUnderResolution:0,

        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        startWithSlide:0,
        fullScreenOffsetContainer: ".header"	
    });
    
});

	// Custom script
	jQuery(function() {
		
		"use strict";
		
		// fixed sticky navbar
		try {
			jQuery('header').sticky({
				topSpacing: 0,
				className: 'sticky'
			});
			jQuery('header').onePageNav({
					scrollSpeed: 0,
					scrollOffset: 0
				})
		} catch (err) {

		}
		
		//Smooth Scroll
		try {
			jQuery('.navbar-nav li a').smoothScroll();
			jQuery('.go-section a').smoothScroll();
			jQuery('.get-start-button').smoothScroll();
			jQuery('.parallax-inner .parallax-home-button a').smoothScroll();
		} catch (err) {

		}
		
		//Header Animation
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 5){
				jQuery('.transparent-nav').addClass("navbar-small");
			}
			else{
				jQuery('.transparent-nav').removeClass("navbar-small");
			}
		});
		
		//full slide
		jQuery('.carousel').carousel({
			interval: 5000, //changes the speed
		});
		
		//slider bottom fixed menu 
		jQuery('.home-2 header').addClass("bottom-menu");
		//add class
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() < 100){
				jQuery('.home-2 header').addClass("bottom-menu");
			}
		});
		//remove class
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 100){
				jQuery('.home-2 header').removeClass("bottom-menu");
			}
		});
		
		//super slide
		jQuery('#slides').superslides({
			animation: 'fade',
			animation_speed: 1000,
			animation_easing: 'linear'
		});
		
		//mb YTPlayer
		jQuery(function(){
			jQuery(".player").mb_YTPlayer();
		});
		
		//home flexslider
		jQuery('.home-flexslider').flexslider({
			animation: "slide",
			animationDuration: 800,
			randomize: true,
			directionNav: false,
		});
		
		//easyPieChart
		jQuery('.chart').easyPieChart({
			scaleColor:false,
			animate:4000,
			size:200,
			lineWidth:10,
			barColor: '#ffd737',
			onStep: function(from, to, percent) {
				jQuery(this.el).find('.percent').text(Math.round(percent));
			}
		});
		
		//magnific-Popup
		jQuery('.popup-ajax').magnificPopup({
			type: 'ajax',
			mainClass: 'mfp-fade',
			showCloseBtn: false,
			overflowY: 'scroll'
		});
		jQuery(document).on('click', '.ajax-popup-dismiss', function (e) {
			e.preventDefault();
			jQuery.magnificPopup.close();
		});
		
		//parallax
		jQuery('.parallax-main').parallax();
		jQuery('.parallax-one').parallax();
		jQuery('.testimonial').parallax();
		jQuery('.partner-parallax').parallax();
		jQuery('.social').parallax();
		jQuery('.contact-header').parallax();
		jQuery('.blog-top').parallax();
		
		//isotope configure
		jQuery(window).load(function(){
		
			// init Isotope
			var jQuerygrid = jQuery('.grid').isotope({
				itemSelector: '.element-item',
				layoutMode: 'fitRows',
				transitionDuration: '0.6s',
			});
			
			// filter functions
			var filterFns = {
				// show if number is greater than 50
				numberGreaterThan50: function() {
				  var number = jQuery(this).find('.number').text();
				  return parseInt( number, 10 ) > 50;
				},
				// show if name ends with -ium
				ium: function() {
				  var name = jQuery(this).find('.name').text();
				  return name.match( /iumjQuery/ );
				}
			}
			
			// bind filter button click
			jQuery('#filters').on( 'click', 'button', function() {
				var filterValue = jQuery( this ).attr('data-filter');
				// use filterFn if matches value
				filterValue = filterFns[ filterValue ] || filterValue;
				jQuerygrid.isotope({ filter: filterValue });
			});

			// change is-checked class on buttons
			jQuery('.button-group').each( function( i, buttonGroup ) {
				var jQuerybuttonGroup = jQuery( buttonGroup );
				jQuerybuttonGroup.on( 'click', 'button', function() {
				  jQuerybuttonGroup.find('.is-checked').removeClass('is-checked');
				  jQuery( this ).addClass('is-checked');
				});
			});
			
		});
		
		// go to top
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() != 0) {
				jQuery('#toTop, #backtotop').fadeIn();	
			} else {
				jQuery('#toTop, #backtotop').fadeOut();
			}
		});
		jQuery('#toTop').click(function() {
			jQuery('body,html').animate({scrollTop:0},800);
		});
		
	});
	
	/* ==============================================
		Auto Close Responsive Navbar on Click
	=============================================== */
	function close_toggle() {
		if (jQuery(window).width() <= 767) {
		  jQuery('.navbar-collapse li').on('click', function(){
			  jQuery('.navbar-collapse').collapse('hide');
		  });
		}
		else {
			jQuery('.navbar .navbar-default a').off('click');
		}
	}
	close_toggle();
	
	jQuery(window).resize(close_toggle);
	
	/* ==============================================
		Active Menu Item on Page Scroll
	=============================================== */   
		
	var sections = jQuery('section')
	  , nav = jQuery('header')
	  , nav_height = nav.outerHeight();
	 
	jQuery(window).on('scroll', function () {
	  var cur_pos = jQuery(this).scrollTop();
	 
	  sections.each(function() {
		var top = jQuery(this).offset().top - nav_height,
			bottom = top + jQuery(this).outerHeight();
			
		if (cur_pos >= top && cur_pos <= bottom) {
		  nav.find('a').removeClass('current');
		  sections.removeClass('current');
	 
		  jQuery(this).addClass('current');
		  nav.find('a[href="#'+jQuery(this).attr('id')+'"]').addClass('current');
		}
	  });
	  
	});