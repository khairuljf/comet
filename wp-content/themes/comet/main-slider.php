<?php defined('ABSPATH') or die("No script kiddies please!");

$slider = AfterSetupTheme::mi_return_theme_option('slider_style');

    if($slider == 'main') { ?>
    <section id="home-revolution-slider">
	<section id="home">
	<header class="clearfix">
				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
							<span class="sr-only"><?php _e('Toggle navigation','reversal')?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url()); ?>">
							<?php $logopic = AfterSetupTheme::mi_return_theme_option('logopic','url');
                                    if ($logopic == ' '){?>
                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"/>
							
							<?php } else { ?>
							<img src="<?php echo esc_url($logopic);?>" alt="Logo"/>
							<?php } ?>
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="main-nav">
							<ul class="nav navbar-nav  navbar-right">
								
								<?php

									        $defaults = array(
									                    'theme_location'  => 'onepage_menu',
									                    'menu'            => '',
									                    'container'       => '',
									                    'container_class' => '',
									                    'menu_class'      => '',
									                    'menu_id'         => '',
									                    'echo'            => true,
									                    'fallback_cb'     => 'wp_page_menu',
									                    'before'          => '',
									                    'after'           => '',
									                    'link_before'     => '',
									                    'link_after'      => '',
									                    'items_wrap'      => '%3$s',
									                    'depth'           => 0,
									                    'walker'          => new mi_description_walker,
									                        );

									      
									          if(has_nav_menu('onepage_menu')) {
									                                  wp_nav_menu( $defaults );
									          }
									                   
									          else {
									            echo 'No menu assigned!';
									          }
									                        ?>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</header>
		</section>
    <!-- section slider -->
    <?php $checkbox1 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox1');
				$sliderimage11 = AfterSetupTheme::mi_return_theme_option('sliderimage11','url');
            		if ($checkbox1 == '1'){?>
		<section id="home">
		<div class="hero">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<ul>
							<!-- SLIDE 1 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage11;?>" data-delay="10000"  data-saveperformance="on" data-title="We Are Vossen">
								<img src="<?php echo $sliderimage11;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt11')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250"
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt12')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn11')?></a></div>
									</div>

							</li>
			<?php $checkbox2 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox2');
				$sliderimage12 = AfterSetupTheme::mi_return_theme_option('sliderimage12','url');
            		if ($checkbox2 == '1'){?>
							<!-- SLIDE 2 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage12;?>" data-delay="10000"  data-saveperformance="on" data-title="Digital Agency">
								<img src="<?php echo $sliderimage12;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt21')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt22')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn21')?></a></div>
									</div>

							</li>
				<?php } ?>
			<?php $checkbox3 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox3');
				$sliderimage13 = AfterSetupTheme::mi_return_theme_option('sliderimage13','url');
            		if ($checkbox3 == '1'){?>
							<!-- SLIDE 3 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage13;?>" data-delay="10000"  data-saveperformance="on" data-title="Creative Coders">
								<img src="<?php echo $sliderimage13;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt31')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt32')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn32')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn31')?></a></div>
									</div>

							</li>
					<?php } ?>
						</ul>
						
					</div>

				</div>	
			</div>
			</section>
			<?php } ?>
		</section>
		<div class="clearfix"></div>
		
<?php } elseif ($slider == 'slider2') { ?>
	<!-- section slider -->
	<section id="home">
	<?php $checkbox1 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox1');
				$sliderimage11 = AfterSetupTheme::mi_return_theme_option('sliderimage11','url');
            		if ($checkbox1 == '1'){?>
		
		
			<!-- Full Page Image Background Carousel Header -->
			<section id="home-revolution-slider">
				
		<div class="hero">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<ul>
							<!-- SLIDE 1 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage11;?>" data-delay="10000"  data-saveperformance="on" data-title="We Are Vossen">
								<img src="<?php echo $sliderimage11;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt11')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250"
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt12')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn11')?></a></div>
									</div>

							</li>
			<?php $checkbox2 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox2');
				$sliderimage12 = AfterSetupTheme::mi_return_theme_option('sliderimage12','url');
            		if ($checkbox2 == '1'){?>
							<!-- SLIDE 2 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage12;?>" data-delay="10000"  data-saveperformance="on" data-title="Digital Agency">
								<img src="<?php echo $sliderimage12;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt21')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt22')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn21')?></a></div>
									</div>

							</li>
				<?php } ?>
			<?php $checkbox3 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox3');
				$sliderimage13 = AfterSetupTheme::mi_return_theme_option('sliderimage13','url');
            		if ($checkbox3 == '1'){?>
							<!-- SLIDE 3 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage13;?>" data-delay="10000"  data-saveperformance="on" data-title="Creative Coders">
								<img src="<?php echo $sliderimage13;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt31')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt32')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn32')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn31')?></a></div>
									</div>

							</li>
					<?php } ?>
						</ul>
						
					</div>

				</div>	
			</div>
			
			</section>
			<?php } ?>
			<!--Start Header-->
			<section class="home-2">
				<header class="clearfix">
					<nav class="navbar navbar-default">
						<div class="container">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
								<span class="sr-only"><?php _e('Toggle navigation','reversal')?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" rel="home" href="index.html">
									<?php $logopic = AfterSetupTheme::mi_return_theme_option('logopic','url');
                                    if ($logopic == ' '){?>
		                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"/>
									
									<?php } else { ?>
									<img src="<?php echo esc_url($logopic);?>" alt="Logo"/>
									<?php } ?>
								</a>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="main-nav">
								<ul class="nav navbar-nav  navbar-right">
									
									<?php

									        $defaults = array(
									                    'theme_location'  => 'onepage_menu',
									                    'menu'            => '',
									                    'container'       => '',
									                    'container_class' => '',
									                    'menu_class'      => '',
									                    'menu_id'         => '',
									                    'echo'            => true,
									                    'fallback_cb'     => 'wp_page_menu',
									                    'before'          => '',
									                    'after'           => '',
									                    'link_before'     => '',
									                    'link_after'      => '',
									                    'items_wrap'      => '%3$s',
									                    'depth'           => 0,
									                    'walker'          => new mi_description_walker,
									                        );

									      
									          if(has_nav_menu('onepage_menu')) {
									                                  wp_nav_menu( $defaults );
									          }
									                   
									          else {
									            echo 'No menu assigned!';
									          }
									                        ?>
									
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container -->
					</nav>
				</header>
			</section>
			
		</section>
		
<?php } elseif ($slider == 'slider3') { ?>
	<!-- section slider -->
		<section id="home">
			
			<header class="clearfix">
				<nav class="navbar navbar-default transparent-nav">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
							<span class="sr-only"><?php _e('Toggle navigation','reversal')?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" rel="home" href="index.html">
									<?php $logopic = AfterSetupTheme::mi_return_theme_option('logopic','url');
                                    if ($logopic == ' '){?>
		                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"/>
									
									<?php } else { ?>
									<img src="<?php echo esc_url($logopic);?>" alt="Logo"/>
									<?php } ?>
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="main-nav">
							<ul class="nav navbar-nav  navbar-right">
								
								<?php

									        $defaults = array(
									                    'theme_location'  => 'onepage_menu',
									                    'menu'            => '',
									                    'container'       => '',
									                    'container_class' => '',
									                    'menu_class'      => '',
									                    'menu_id'         => '',
									                    'echo'            => true,
									                    'fallback_cb'     => 'wp_page_menu',
									                    'before'          => '',
									                    'after'           => '',
									                    'link_before'     => '',
									                    'link_after'      => '',
									                    'items_wrap'      => '%3$s',
									                    'depth'           => 0,
									                    'walker'          => new mi_description_walker,
									                        );

									      
									          if(has_nav_menu('onepage_menu')) {
									                                  wp_nav_menu( $defaults );
									          }
									                   
									          else {
									            echo 'No menu assigned!';
									          }
									                        ?>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</header>
			<?php $checkbox1 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox1');
				$sliderimage11 = AfterSetupTheme::mi_return_theme_option('sliderimage11','url');
            		if ($checkbox1 == '1'){?>
			<!-- home parallax -->
			<section id="home-revolution-slider">
				
		<div class="hero">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<ul>
							<!-- SLIDE 1 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage11;?>" data-delay="10000"  data-saveperformance="on" data-title="We Are Vossen">
								<img src="<?php echo $sliderimage11;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt11')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250"
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt12')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-1"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn11')?></a></div>
									</div>

							</li>
			<?php $checkbox2 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox2');
				$sliderimage12 = AfterSetupTheme::mi_return_theme_option('sliderimage12','url');
            		if ($checkbox2 == '1'){?>
							<!-- SLIDE 2 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage12;?>" data-delay="10000"  data-saveperformance="on" data-title="Digital Agency">
								<img src="<?php echo $sliderimage12;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt21')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt22')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-2"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn12')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn21')?></a></div>
									</div>

							</li>
				<?php } ?>
			<?php $checkbox3 = AfterSetupTheme::mi_return_theme_option('section-media-checkbox3');
				$sliderimage13 = AfterSetupTheme::mi_return_theme_option('sliderimage13','url');
            		if ($checkbox3 == '1'){?>
							<!-- SLIDE 3 -->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $sliderimage13;?>" data-delay="10000"  data-saveperformance="on" data-title="Creative Coders">
								<img src="<?php echo $sliderimage13;?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

									<!-- Home Heading -->
									<div class="tp-caption home-heading sft"
										data-x="center"  
										data-y="150"
										data-speed="1200"
										data-start="1100"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt31')?></div>
									</div>
									<!-- Home Subheading -->
									<div class="tp-caption home-subheading sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1350"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><?php echo AfterSetupTheme::mi_return_theme_option('slidertxt32')?></div>
									</div>
									<!-- Home Button -->
									<div class="tp-caption home-button sft fadeout"
										data-x="center" 
										data-y="250" 
										data-speed="1200"
										data-start="1550"
										data-easing="Power3.easeInOut"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.1"
										data-endelementdelay="0.1"
										data-endspeed="300"
										style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
										<div class="op-3"><a href="<?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn32')?>" class="btn btn-primary btn-scroll"><?php echo AfterSetupTheme::mi_return_theme_option('sliderbtn31')?></a></div>
									</div>

							</li>
					<?php } ?>
						</ul>
						
					</div>

				</div>	
			</div>
			
			</section>
			<?php } ?>
		</section>
<?php } elseif ($slider == 'slider4') { ?>
		<!-- section slider -->
	<?php $slider41 = AfterSetupTheme::mi_return_theme_option('section-media-slider41');
		$sliderimage41 = AfterSetupTheme::mi_return_theme_option('sliderimage41','url');
            if ($slider41 == '1'){?>
		<section id="home">
				
			<!-- image Slider -->
			<div id="slides">
				<div class="slides-container">
				
					<!-- Slider Images -->
					<div class="background-image-1" style="background:url('<?php echo $sliderimage41;?>')"></div>
					<div class="background-image-2" style="background:url('<?php echo AfterSetupTheme::mi_return_theme_option('sliderimage42','url');?>')"></div>
					<div class="background-image-3" style="background:url('<?php echo AfterSetupTheme::mi_return_theme_option('sliderimage43','url');?>')"></div>
					<div class="background-image-4" style="background:url('<?php echo AfterSetupTheme::mi_return_theme_option('sliderimage44','url');?>')"></div>
					<div class="background-image-5" style="background:url('<?php echo AfterSetupTheme::mi_return_theme_option('sliderimage45','url');?>')"></div>
					<!-- End Slider Images -->
				 
				</div>
				
				<!-- Slider nav Controls -->				
				<nav class="slides-navigation">
				  <a href="#" class="next"></a>
				  <a href="#" class="prev"></a>
				</nav>
				<!-- End Slider nav Controls -->
				
				<!-- Text Slider -->
				<div class="slide-inner-slide">
					<?php $text41 = AfterSetupTheme::mi_return_theme_option('section-media-text41');
						$slidertext41 = AfterSetupTheme::mi_return_theme_option('slidertext41');
            				if ($text41 == '1'){?>
					<!-- Text Slider -->
					<div class="home-flexslider">
					
						<!-- Text Slides -->
						<ul class="slides">
							<li><?php echo $slidertext41;?></li>
							<?php $text42 = AfterSetupTheme::mi_return_theme_option('section-media-text42');
								$slidertext42 = AfterSetupTheme::mi_return_theme_option('slidertext42');
            						if ($text42 == '1'){?>
							<li><?php echo $slidertext42;?></li>
							<?php } ?>
							<?php $text43 = AfterSetupTheme::mi_return_theme_option('section-media-text43');
								$slidertext43 = AfterSetupTheme::mi_return_theme_option('slidertext43');
            						if ($text43 == '1'){?>
							<li><?php echo $slidertext43;?></li>
							<?php } ?>
						</ul>
						<!-- End Text Slides -->
						<div class="clear"></div>
						
					</div>
					<?php } ?>
					<!-- Home Description -->
					<div class="home-text"><?php echo AfterSetupTheme::mi_return_theme_option('botcontent');?></div>
					<!-- End Home Description -->
					
					<!-- get started button -->
					<a class="get-start-button" href="<?php echo AfterSetupTheme::mi_return_theme_option('buttonlink4');?>"><?php echo AfterSetupTheme::mi_return_theme_option('buttontext4');?></a>
					<!-- End get started Button -->
					
				</div>
				<!-- End text slide -->
				
			</div>
			<!-- End Super Slider Images -->
			
		</section>
		<?php } ?>
		<!--Start Header-->
		<section>
			<header class="clearfix">
				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
							<span class="sr-only"><?php _e('Toggle navigation','reversal')?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" rel="home" href="index.html">
								<?php $logopic = AfterSetupTheme::mi_return_theme_option('logopic','url');
                                    if ($logopic == ' '){?>
		                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"/>
									
									<?php } else { ?>
									<img src="<?php echo esc_url($logopic);?>" alt="Logo"/>
									<?php } ?>
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="main-nav">
							<ul class="nav navbar-nav  navbar-right">
								
								<?php

									        $defaults = array(
									                    'theme_location'  => 'onepage_menu',
									                    'menu'            => '',
									                    'container'       => '',
									                    'container_class' => '',
									                    'menu_class'      => '',
									                    'menu_id'         => '',
									                    'echo'            => true,
									                    'fallback_cb'     => 'wp_page_menu',
									                    'before'          => '',
									                    'after'           => '',
									                    'link_before'     => '',
									                    'link_after'      => '',
									                    'items_wrap'      => '%3$s',
									                    'depth'           => 0,
									                    'walker'          => new mi_description_walker,
									                        );

									      
									          if(has_nav_menu('onepage_menu')) {
									                                  wp_nav_menu( $defaults );
									          }
									                   
									          else {
									            echo 'No menu assigned!';
									          }
									                        ?>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</header>
		</section>
        <!--End Header-->
<?php } elseif ($slider == 'slider5') { ?>
	<!-- section slider -->
	<?php $video51 = AfterSetupTheme::mi_return_theme_option('section-media-slider51');
		$slidervideo51 = AfterSetupTheme::mi_return_theme_option('slidervideo51');
            if ($video51 == '1'){?>
		<section id="slider">
				
			<!-- image Slider -->
			<div id="slides">
				<div class="slides-container">
				
					<!-- Video -->
					<div id="P3" class="player video-container" data-property="{videoURL:'<?php echo $slidervideo51;?>',containment:'#slides',autoPlay:true, mute:true, startAt:0, opacity:1}"></div>
					<!-- End Video -->
				 
				</div>
				
				<!-- Text Slider -->
				<div class="slide-inner-slide">
					<?php $text51 = AfterSetupTheme::mi_return_theme_option('section-media-text51');
								$slidertext51 = AfterSetupTheme::mi_return_theme_option('slidertext51');
            						if ($text51 == '1'){?>
					<!-- Text Slider -->
					<div class="home-flexslider">
					
						<!-- Text Slides -->
						<ul class="slides">
							<li><?php echo $slidertext51;?></li>
							<?php $text52 = AfterSetupTheme::mi_return_theme_option('section-media-text52');
								$slidertext52 = AfterSetupTheme::mi_return_theme_option('slidertext52');
            						if ($text52 == '1'){?>
							<li><?php echo $slidertext52;?></li>
							<?php } ?>
							<?php $text53 = AfterSetupTheme::mi_return_theme_option('section-media-text53');
								$slidertext53 = AfterSetupTheme::mi_return_theme_option('slidertext53');
            						if ($text53 == '1'){?>
							<li><?php echo $slidertext53;?></li>
							<?php } ?>
						</ul>
						<!-- End Text Slides -->
						<div class="clear"></div>
						
					</div>
					<?php } ?>
					<!-- Home Description -->
					<!-- Home Description -->
					<div class="home-text"><?php echo AfterSetupTheme::mi_return_theme_option('botcontent5');?></div>
					<!-- End Home Description -->
					
					<!-- get started button -->
					<a class="get-start-button" href="<?php echo AfterSetupTheme::mi_return_theme_option('buttonlink5');?>"><?php echo AfterSetupTheme::mi_return_theme_option('buttontext5');?></a>
					<!-- End get started Button -->
					<!-- End get started Button -->
					
				</div>
				<!-- End text slide -->
				
			</div>
			<!-- End Super Slider Images -->
			
		</section>
		<?php } ?>
		<!--Start Header-->
		<section>
			<header class="clearfix">
				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
							<span class="sr-only"><?php _e('Toggle navigation','reversal')?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url()); ?>">
							<?php $logopic = AfterSetupTheme::mi_return_theme_option('logopic','url');
                                    if ($logopic == ' '){?>
                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"/>
							
							<?php } else { ?>
							<img src="<?php echo esc_url($logopic);?>" alt="Logo"/>
							<?php } ?>
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="main-nav">
							<ul class="nav navbar-nav  navbar-right">
								
								<?php

									        $defaults = array(
									                    'theme_location'  => 'onepage_menu',
									                    'menu'            => '',
									                    'container'       => '',
									                    'container_class' => '',
									                    'menu_class'      => '',
									                    'menu_id'         => '',
									                    'echo'            => true,
									                    'fallback_cb'     => 'wp_page_menu',
									                    'before'          => '',
									                    'after'           => '',
									                    'link_before'     => '',
									                    'link_after'      => '',
									                    'items_wrap'      => '%3$s',
									                    'depth'           => 0,
									                    'walker'          => new mi_description_walker,
									                        );

									      
									          if(has_nav_menu('onepage_menu')) {
									                                  wp_nav_menu( $defaults );
									          }
									                   
									          else {
									            echo 'No menu assigned!';
									          }
									                        ?>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</header>
		</section>
        <!--End Header-->
<?php } else {
	printf('sdsffs');
} ?>