<?php defined('ABSPATH') or die("No script kiddies please!");
/*
Template name: Blog Template
*/
get_header(); 
get_template_part('menu-section');?>
<?php get_template_part('banner-section');?>		
		<!-- section blog content wraper -->
		<section class="blog-content-wraper">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="row">
							<div class="col-md-12">
							<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); 
								if (have_posts()) : 
									while (have_posts()) : the_post(); ?>
								<!-- blog post one -->
								<div class="blog-post-box">
								<?php if( has_post_format( 'image' ) !='') {?>
								<?php if ( has_post_thumbnail() ) { ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
									<div class="blog-post-image">
										<img class="img-responsive" src="<?php echo $url;?>" alt="Image">
									</div>
									<?php } } ?>
									<?php if( has_post_format( 'video' ) !='') {?>
									<div class="blog-post-video">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php echo get_post_meta($post->ID,'rnr_postvideosource',true);?>"></iframe>
										</div>
									</div>
									<?php } ?>
									<div class="blog-post-inner">
										<div class="post-info info-width">
											<div class="author-image">
												<img class="img-responsive" src="<?php echo get_post_meta($post->ID,'rnr_postimg',true);?>" alt="Image">
											</div>
											<div class="post-date">
												<span class="date"><?php echo esc_attr(get_the_date('j'));?></span><br>
												<span class="month"><?php echo esc_attr(get_the_date('F'));?></span>
											</div>
											<div class="post-quote">
												<div aria-hidden="true" data-icon="&#xe006;"></div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="blog-post-content">
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
											<p><?php the_excerpt();?></p>
											<div class="read-more">
												<a href="<?php the_permalink();?>"><?php esc_html_e('read more','reversal')?></a>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<!-- end blog post one-->
								<?php endwhile;
						  			endif;
			              			wp_reset_postdata(); ?>
								
								
								<!-- blog pagination -->
								<div class="blog-pagination">
									<?php 
										the_posts_pagination( array(
											'prev_text'          => __( '<i class="fa fa-angle-left"></i>', '' ),
											'next_text'          => __( '<i class="fa fa-angle-right"></i>', '' ),
											
										) ); ?>
									
									<div class="clearfix"></div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<?php if ( is_active_sidebar( 'reversal-blog-sidebar' ) ) { 
                       dynamic_sidebar( 'reversal-blog-sidebar' ); 
                      } ?>	
						
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>
