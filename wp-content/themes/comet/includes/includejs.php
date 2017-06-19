<?php

if( !function_exists ('mi_enqueue_scripts') ) :
	function mi_enqueue_scripts() {
		//vendor
		wp_enqueue_script('jquerymin', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('bootstrapmin', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0',true);
		wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/js/jquery.smooth-scroll.js', array('jquery'), '1.0',true);
		wp_enqueue_script('revslider', get_template_directory_uri() . '/js/revslider.min.js', array('jquery'), '1.0',true);		
		wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.js', array('jquery'), '1.0',true);
		wp_enqueue_script('jqueryflexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '1.0',true);
		wp_enqueue_script('YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array('jquery'), '1.0',true);
		
		wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('wowmin', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '1.0',true);

		wp_enqueue_script('magnificpopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('mainscript', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0',true);
		
		
}

	add_action('wp_enqueue_scripts', 'mi_enqueue_scripts');
endif;

