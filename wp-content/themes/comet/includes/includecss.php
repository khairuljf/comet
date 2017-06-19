<?php
class IncludeCss {

	public static function mi_add_css_js(){

		$src_css =  get_template_directory_uri()."";
	
			
		
	
		$css_file = AfterSetupTheme::mi_return_theme_option('style_switcher');
		if($css_file==null){
			$css_file = 'sun';
		}
		
		$protocol = is_ssl() ? 'https' : 'http';
		$css =array(
				'family'=>$protocol.'://fonts.googleapis.com/css?family=Lato:300,400,700,900',
				'fontawesome'=>'/fonts/fontAwesome/font-awesome.min.css',
				'bootstrap'=>'/css/bootstrap.css',
				'font'=>'/css/style-font.css',
				'lightbox'=>'/css/lightbox.css',
				'magnific'=>'/css/magnific-popup.css',
				'animate'=>'/css/animate.css',
				'slider'=>'/css/full-slider.css',
				'flexslider'=>'/css/flexslider.css',
				'revolution'=>'/css/revolution-slider.css',
				'style'=>'/css/style.css',		
				'responsive'=>'/css/responsive.css',
				$css_file=>'/css/color/'.$css_file.'.css',

			
		);

		

			
		foreach ($css as $key=>$value){
			if($key=='family'){
				wp_register_style($key, $value);
			}else{
			wp_register_style($key, $src_css.$value);
			}
			wp_enqueue_style($key);
		}
		
			
	}

	
}