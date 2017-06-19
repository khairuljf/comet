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