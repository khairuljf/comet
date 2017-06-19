<?php

// Reversal Shortcode Start Here
// About Page

function re_about_main($atts, $content = null){
	extract(shortcode_atts(array(
		'class'	=>''
	),$atts));
	
	$html= '';
	$html.= '<div class="home">';
	$html.= '<div class="section-more-feather">';
	$html.= '<div class="container">';
	$html.= '<div class="row">';
	$html.= do_shortcode($content);
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	
	return $html;
}
add_shortcode('about_us','re_about_main');


function re_about_content($atts,$content= null){
	extract(shortcode_atts(array(
		
		'icon'	=>'',
		'title'	=>'',
		'text'	=>'',
		'button'	=>'',
		'link'	=>''
		
	),$atts));
	
	$html='';
	$html.='<div class="col-md-3 col-sm-6 col-xs-12 feather-part">';
	$html.='<div class="feather-icon">';
	$html.='<div class="icon-style">';
	$html.='<div aria-hidden="true" data-icon="&#'.$icon.';"></div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<h3>'.$title.'</h3>';
	$html.='<p>'.$text.'</p>';
	$html.='</div>';

	return $html;
}
add_shortcode('about','re_about_content');


// Poster Page
function parallax_poster($atts,$content=null){
	extract(shortcode_atts(array(
	
		'bg_image'	=>'',
		'logo'	=>'',
		'main_title'	=>'',
		'sub_title'	=>'',
		'button'	=>'',
		'link'	=>''
		
	),$atts));
	
	$html= '';
	$html.= '<div class="parallax-one" data-parallax="scroll" data-image-src="'.$bg_image.'">';
	$html.= '<div class="container">';
	$html.= '<div class="row">';
	$html.= '<div class="col-md-12">';
	$html.= '<div class="purchase-now">';
	$html.= '<div class="logo">';
	$html.= '<a href="#"><img src="'.$logo.'" alt="logo"></a>';
	$html.= '</div>';
	$html.= '<h1>'.$main_title.'</h1>';
	$html.= '<p>'.$sub_title.'</p>';
	$html.= '<div class="buy-now">';
	$html.= '<a href="'.$link.'"><span>'.$button.'</span></a>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	
	return $html;
}
add_shortcode('poster','parallax_poster');

// Service Page

function re_service($atts, $content= null){
	extract(shortcode_atts(array(
		
		'class'	=>'',
		'page_title'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="service">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$page_title.'</h1>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	$html.=do_shortcode($content);
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;

}
add_shortcode('service_full','re_service');

function re_service_text($atts,$content=null){
	
	$html='';
	$html.='<div class="col-md-4">';
	$html.=do_shortcode($content);
	$html.='</div>';
	return $html;
	
}
add_shortcode('service_main','re_service_text');

function re_service_main_text_left($atts,$content=null){
	extract(shortcode_atts(array(
		'title'	=>'',
		'icon'	=>'',
		'text'	=>''
	
	),$atts));

	$html='';
	$html.='<div class="tab-part">';
	$html.='<div  class="service-icon">';
	$html.='<div class="icon-size" aria-hidden="true" data-icon="&#'.$icon.';"></div>';
	$html.='<!-- <div class="hover-line"></div> -->';
	$html.='</div>';
	$html.='<div class="service-text">';
	$html.='<h4>'.$title.'</h4>';
	$html.='<p>'.$text.'</p>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}
add_shortcode('service_left','re_service_main_text_left');	

function re_service_main_text_right($atts,$content=null){
	extract(shortcode_atts(array(
		'title'	=>'',
		'icon'	=>'',
		'text'	=>''
	
	),$atts));

	$html='';
	$html.='<div class="tab-part">';
	$html.='<div  class="service-icon tab-right">';
	$html.='<div class="icon-size" aria-hidden="true" data-icon="&#'.$icon.';"></div>';
	$html.='<!-- <div class="hover-line"></div> -->';
	$html.='</div>';
	$html.='<div class="service-text tab-right-text">';
	$html.='<h4>'.$title.'</h4>';
	$html.='<p>'.$text.'</p>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}
add_shortcode('service_right','re_service_main_text_right');										
	
function service_image($atts,$content){
	extract(shortcode_atts(array(
		
		'images_source'	=>''
		
	),$atts));
	
	$html='';
	$html.='<div class="col-md-4">';
	$html.='<div class="service-image">';
	$html.='<img class="img-responsive" src="'.$images_source.'" alt="Image">';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}
add_shortcode('image','service_image');						

// Skill Section

function re_skill_full($atts,$content=null){
	extract(shortcode_atts(array(
	
		'title'	=>'',
		'top_text'	=>'',
		'sub_text'	=>'',
	
	),$atts));
	
	$html='';
	$html.='<div class="features">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="section-header-title">';
	$html.='<h3>'.$title.'</h3>';
	$html.='<p class="capabilities-text">'.$top_text.'</p>';
	$html.='<P>'.$sub_text.'</P>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	$html.= do_shortcode($content);
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;

}
add_shortcode('skill_main','re_skill_full');
				
					
function re_skill_main($atts,$content=null){
	extract(shortcode_atts(array(
	
		'title'	=>'',
		'text'	=>'',
		'skill_percent'	=>'',
	
	),$atts));
	
	$html='';
	$html.='<div class="col-md-3 col-sm-6 col-xs-12">';
	$html.='<div class="chart-round">';
	$html.='<span class="chart" data-percent="'.$skill_percent.'">';
	$html.='<span class="percent"></span>';
	$html.='</span>';
	$html.='<h4>'.$title.'</h4>';
	$html.='<P>'.$text.'</P>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;

}
add_shortcode('skill','re_skill_main');	


// Customer Section

function re_customer_full($atts,$content=null){
	extract(shortcode_atts(array(
	
		'title'	=>'',
		'bg_image'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="testimonial" data-parallax="scroll" data-image-src="'.$bg_image.'">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$title.'</h1>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div id="testimonials-carousel" class="carousel slide" data-ride="carousel">';
	$html.=do_shortcode($content);
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}
add_shortcode('customer_main','re_customer_full');

function customer_list_mian($atts,$content=null){
	
	$html='';
	$html.='<ol class="carousel-indicators">';
	$html.=do_shortcode($content);
	$html.='</ol>';
	
	return $html;
}
add_shortcode('cus_list_main','customer_list_mian');

function customer_list($atts,$content=null){
	extract(shortcode_atts(array(
	
		'data_slide'	=>'',
		'active_li'	=> ''
		
	),$atts));
	
	$html='';
	$html.='<li data-target="#testimonials-carousel" data-slide-to="'.$data_slide.'" class="'.$active_li.'"></li>';
	
	return $html;
}
add_shortcode('cus_list','customer_list');

function re_customer_main($atts,$content=null){
	
	$html='';
	$html.='<div class="carousel-inner">';
	$html.=do_shortcode($content);
	$html.='</div>';
	
	return $html;
}
add_shortcode('content_main','re_customer_main');
							
function re_customer($atts,$content=null){
	extract(shortcode_atts(array(
	
		'comment'	=>'',
		'image'	=>'',
		'name'	=>'',
		'author_site'	=>'',
		'test_active'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="item '.$test_active.'">';
	$html.='<div class="customer-comment">';
	$html.='<div class="text-box-top"></div>';
	$html.='<p class="comment-text">'.$comment.'</p>';
	$html.='<div class="arrow-img"></div>';
	$html.='<div class="customers-image">';
	$html.='<img src="'.$image.'" alt="logo">';
	$html.='</div>';
	$html.='<h3>'.$name.'</h3>';
	$html.='<p class="author-site">'.$author_site.'</p>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}
add_shortcode('content','re_customer');								
								
							
// Contact Page

function re_contact($atts,$content=null){
	extract(shortcode_atts(array(
	
		'bg_image'	=>'',
		'logo'	=>'',
		'title'	=>'',
		'email'	=>'',
		'address'	=>'',
		'phone'	=>''
		
	),$atts));
	
	$html= '';
	$html.= '<div class="contact-header" data-parallax="scroll" data-image-src="'.$bg_image.'">';
	$html.= '<div class="container">';
	$html.= '<div class="row">';
	$html.= '<div class="col-lg-12 col-md-12">';
	$html.= '<div class="contact-header-title">';
	$html.= '<div class="contact-header-logo"><img src="'.$logo.'" alt="logo"></div>';
	$html.= '<h1>'.$title.'</h1>';
	$html.= '<p class="mail">'.$email.'</p>';
	$html.= '<p class="address-info">'.$address.'</p>';
	$html.= '<div class="contact-number">'.$phone.'</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	
	return $html;
}

add_shortcode('contact','re_contact');	

//Contact Form
function re_contact_form($atts,$content=null){
	extract(shortcode_atts(array(
	
		'class'	=>''
		
	),$atts));
	
	$html= '';
	$html.= '<div class="contact">';
	$html.= '<div class="container">';
	$html.= '<div class="row">';
	$html.= '<div class="col-lg-12 col-md-12">';
	$html.= '<div class="contact-form">';
	$html.= do_shortcode($content);
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	
	
	return $html;
}

add_shortcode('contact_form_shortcode','re_contact_form');

//Partners Section


function re_partner_full($atts,$content=null){
	extract(shortcode_atts(array(
	
		'bg_image'	=>''
		
	),$atts));
	
	$html= '';
	$html.= '<div class="partner-parallax" data-parallax="scroll" data-image-src="'.$bg_image.'">';
	$html.= '<div class="partner-inner">';
	$html.= '<div id="partner-carousel" class="carousel slide" data-ride="carousel">';
	$html.= '<div class="carousel-inner">';
	$html.= do_shortcode($content);
	$html.= '</div>';
	$html.= '<a class="left carousel-control" href="#partner-carousel" data-slide="prev"></a>';
	$html.= '<a class="right carousel-control" href="#partner-carousel" data-slide="next"></a>';
	$html.= '</div>';
	$html.= '</div>';
	$html.= '</div>';
	
	return $html;
}

add_shortcode('re_partner','re_partner_full');	


function re_partner_main($atts,$content=null){
	extract(shortcode_atts(array(
	
		'act'	=>''
		
	),$atts));
	
	$html= '';
	$html.= '<div class="item '.$act.'">';
	$html.= '<ul>';
	$html.= do_shortcode($content);
	$html.= '</ul>';
	$html.= '</div>';
	
	return $html;
}

add_shortcode('partner_main','re_partner_main');	


function re_partner($atts,$content=null){
	extract(shortcode_atts(array(
	
		'logo'	=>''
	),$atts));
	
	$html= '';
	$html.= '<li><img src="'.$logo.'" alt="image"/></li>';
	
	return $html;
}

add_shortcode('partner','re_partner');				
					
//Social Section	

function re_social_full($atts,$content=null){
	extract(shortcode_atts(array(
		'bg_image'	=>''
	),$atts));
	
	$html='';
	$html.='<div class="social" data-parallax="scroll" data-image-src="'.$bg_image.'">';
	$html.=do_shortcode($content);
	$html.='</div>';
	
	return $html;
}				
add_shortcode('social_full','re_social_full');	

function re_twit_full($atts,$content=null){
	extract(shortcode_atts(array(
		'id'	=>''
	),$atts));
	
	$html='';
	$html.='<div id="social-carousel" class="carousel slide" data-ride="carousel">';
	$html.='<div class="carousel-inner">';
	$html.= do_shortcode($content);
	$html.='</div>';
	$html.='<a class="left carousel-control" href="#social-carousel" data-slide="prev"></a>';
	$html.='<a class="right carousel-control" href="#social-carousel" data-slide="next"></a>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('twit_full','re_twit_full');						
								
function re_twit($atts,$content=null){
	extract(shortcode_atts(array(
	
		'icon'	=>'',
		'tweet_small'	=>'',
		'tweet_strong'	=>'',
		'button'	=>'',
		'twit_act'	=>'',
		'link'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="item '.$twit_act.'">';
	$html.='<div class="recent-tweet">';
	$html.='<div class="tweet-icon-box">';
	$html.='<div class="tweet-icon"><i class="fa '.$icon.'"></i></div>';
	$html.='</div>';
	$html.='<p class="tweet-small">'.$tweet_small.'</p>';
	$html.='<p class="tweet-strong">'.$tweet_strong.'</p>';
	$html.='<div class="tweet-details">';
	$html.='<a href="'.$link.'">'.$button.'</a>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('twit','re_twit');						

function social_icon_mian($atts,$content=null){
	extract(shortcode_atts(array(
	
		'title'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="social-network">';
	$html.='<h2>'.$title.'</h2>';
	$html.='<ul>';
	$html.= do_shortcode($content);
	$html.='</ul>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('social_icon','social_icon_mian');								
								
function re_social_icon($atts,$content=null){
	extract(shortcode_atts(array(
	
		'link'	=>'',
		'icon'	=>''
	
	),$atts));
	
	$html='';
	$html.='<li><a href="'.$link.'" aria-hidden="true" data-icon="&#'.$icon.';"></a></li>';
	
	return $html;
}				
add_shortcode('social','re_social_icon');									
																
//Price Section		

function re_price_full($atts,$content=null){
	extract(shortcode_atts(array(
		'title'	=>'',
		'text'	=>''
	),$atts));
	
	$html='';
	$html.='<div class="prices">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$title.'</h1>';
	$html.='<P>'.$text.'</P>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	$html.= do_shortcode($content);
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('price_full','re_price_full');

function re_price_main($atts,$content=null){
	extract(shortcode_atts(array(
		'price'	=>'',
		'duration'	=>'',
		'plan'	=>'',
		'button'	=>'',
		'link'	=>''
		
	),$atts));
	
	$html='';
	$html.='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
	$html.='<div class="price-table">';
	$html.='<div class="price">';
	$html.='<span class="price-rate">'.$price.'</span><br>';
	$html.='<span class="price-period">'.$duration.'</span>';
	$html.='</div>';
	$html.='<h3>'.$plan.'</h3>';
	$html.= do_shortcode($content);
	$html.='<div class="buy-now-button">';
	$html.='<a href="'.$link.'">'.$button.'</a>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('price_main','re_price_main');


function re_price($atts,$content=null){
	extract(shortcode_atts(array(
		'plan_option' => '',
		'plan_amount' => ''
	),$atts));
	
	$html='';
	$html.='<p class="tbl-border"><span class="price-number">'.$plan_amount.'</span>'.$plan_option.'</p>';
	
	return $html;
}				
add_shortcode('price','re_price');									
	
//Post Section		

function re_blog($atts,$content=null){
	extract(shortcode_atts(array(
		'title'	=>'',
		'text'	=>'',
		'cat_name'	=>''
	),$atts));
	
	$html='';
	$html.='<div class="blog_page">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$title.'</h1>';
	$html.='<P>'.$text.'</P>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	
	query_posts( 'showposts=4&category_name='.$cat_name.'' );
	if (have_posts()) : while (have_posts()) : the_post();
	
	$html.='<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
	$html.='<div class="home-blog-post-box">';
	$html.='<div class="post-info">';
	$html.='<div class="author-image">';
	$html.='<img class="img-responsive" src="';
	$html.= get_post_meta(get_the_ID(), 'rnr_postimg', true);
	$html.= '" alt="Image">';
	$html.='</div>';
	$html.='<div class="post-date">';
	$html.='<span class="date">';
	$html.= get_the_time('d');
	$html.='</span><br>';
	$html.='<span class="month">';
	$html.=get_the_time('M');
	$html.='</span>';
	$html.='</div>';
	$html.='<div class="post-quote">';
	if(has_post_format( 'video' )){
		$html.='<div aria-hidden="true" data-icon="&#x49;"></div>';
	}
	elseif(has_post_format( 'quote' )){
		$html.='<div aria-hidden="true" data-icon="&#x7c;"></div>';
	}
	elseif(has_post_format( 'image' )){
		$html.='<div aria-hidden="true" data-icon="&#xe006;"></div>';
	}
	else{
		$html.='<div aria-hidden="true" data-icon="&#xe082;"></div>';
	}
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="post-content">';
	$html.='<a href="';
	$html.= get_the_permalink();
	$html.='"><h3>';
	$html.= get_the_title();
	$html.='</h3></a>';
	$html.='<p>';
	$html.=get_the_excerpt();
	$html.='</p>';
	$html.='</div>';
	if( has_post_format( 'image' ) !='') {
	if ( has_post_thumbnail() ) { 
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
	$html.='<div class="post-image">';
	$html.='<a href="';
	$html.= get_the_permalink();
	$html.='">';
	$html.= '<img class="img-responsive" src="';
	$html.= $url;
	$html.= '" alt="Image">';
	$html.='<div class="projectinfo"></div>';
	$html.='</a>';
	$html.='</div>';
	} }
	$html.='<div class="clear"></div>';
	$html.='</div>';
	$html.='</div>';
	endwhile;
	endif;
	wp_reset_query();
	
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('blog','re_blog');				
	
// Team Section
								
function re_team_full($atts,$content=null){
	extract(shortcode_atts(array(
	
		'class'	=>'',
		'title'	=>'',
		'sub_title'	=>'',
		'cat_name'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="team">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$title.'</h1>';
	$html.='<P>'.$sub_title.'</P>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="row">';
	
	global $post;
	query_posts(array(
		'post_type' => 'team',
		'showposts' => -1
		    ));
	if (have_posts()) : while (have_posts()) : the_post();
	
	$html.='<div class="col-md-3 col-sm-6 col-xs-12 our-team">';
	$html.= '<a class="popup-ajax" href="';
	$html.= get_the_permalink();
	$html.= '">';
	$html.='<div class="our-team-image">';	
	$html.= get_the_post_thumbnail();
	
	$html.='<div class="project-info"></div>';
	$html.='</div>';
	$html.= '</a>';
	$html.='<div class="member-info">';
	$html.='<h4>';
	$html.= get_the_title();
	$html.='</h4>';
	$html.='<p>';
	$html.= get_post_meta(get_the_ID(), 'rnr_dg_name', true);
	$html.='</p>';
	$html.='</div>';
	$html.='</div>';
	endwhile;
	endif;
	wp_reset_query();
	
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;

}
add_shortcode('team_main','re_team_full');		
								
function re_team_main($atts,$contain=null){
	extract(shortcode_atts(array(
	
		'photo'	=>'',
		'name'	=>'',
		'designation'	=>''
	
	),$atts));
	
	$html='';
	$html.='<div class="col-md-3 col-sm-6 col-xs-12 our-team">';
	$html.='<div class="our-team-image">';
	$html.='<img src="'.$photo.'" alt="logo">';
	$html.='<div class="project-info"></div>';
	$html.='</div>';
	$html.='<div class="member-info">';
	$html.='<h4>'.$name.'</h4>';
	$html.='<p>'.$designation.'</p>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;

}
add_shortcode('team','re_team_main');	



//Portfolio Section		

function re_port($atts,$content=null){
	extract(shortcode_atts(array(
		'title'	=>'',
		'text'	=>''
	),$atts));
	
	$html='';
	$html.='<div class="portfolio">';
	$html.='<div class="container">';
	$html.='<div class="row">';
	$html.='<div class="col-md-12">';
	$html.='<div class="section-header-title">';
	$html.='<h1>'.$title.'</h1>';
	$html.='<P>'.$text.'</P>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='<div class="isotope-wrapper">';
	$html.='<div id="filters" class="button-group">';
	
	if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
        $portfolio_category = get_terms('portfolio_category');
        if($portfolio_category):
		$html .= '<button class="is-checked" type="button" data-filter="*">ALL</button>';
		foreach($portfolio_category as $portfolio_cat):
		$html .= '<button type="button" data-filter=".';
		$html .= $portfolio_cat->slug;
		$html .= '">';
		$html .= $portfolio_cat->name ;
		$html .= '</button>';
		endforeach;
		endif;
		endif;
	
	$html.='</div>';
	$html.='<div class="grid">';
	
	global $post;
	query_posts(array(
		'post_type' => 'portfolio',
		'showposts' => -1
		    ));
	if (have_posts()) : while (have_posts()) : the_post();
	$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category',true);
	$html.='<div class="element-item item-width ';
	foreach($portfolio_category as $portfolio_cat);
	$html .= $portfolio_cat->slug . ' ';
	$html .= '">';
	$html.='<div class="portfolio-item-inner">';
	$html.='<figure>';
	$html.= get_the_post_thumbnail();
	$html.='<figcaption>';
	$url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
	$html.='<div class="details-link-info">';
	$html.='<a href="';
	$html .= $url;
	$html.='" data-lightbox="gallery" class="plus-link-icon"><i class="fa fa-plus-circle"></i></a>';
	$html.='<a class="popup-ajax" href="';
	$html .= get_the_permalink();
	$html .= '"><h4>';
	$html.= get_the_title();
	$html.='</h4></a>';
	$html.='<p>';
	$html .= $portfolio_cat->name ;
	$html.='</p>';
	$html.='</div>';
	$html.='</figcaption>';
	$html.='</figure>';
	$html.='</div>';
	$html.='</div>';
	
	endwhile;
	endif;
	
	wp_reset_query();
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	
	return $html;
}				
add_shortcode('portfolio','re_port');	

	
