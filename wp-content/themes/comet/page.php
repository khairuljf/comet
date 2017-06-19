<?php defined('ABSPATH') or die("No script kiddies please!");
get_header();
if (AfterSetupTheme::mi_return_theme_option('slider_style')=='main'){
get_template_part('main-slider');
} elseif ((AfterSetupTheme::mi_return_theme_option('slider_style')=='slider2')) {
	get_template_part('main-slider');
}
while(have_posts() ) : the_post(); 
the_content();
 endwhile; wp_reset_postdata(); ?>

<?php get_footer();?>