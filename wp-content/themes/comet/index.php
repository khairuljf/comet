<?php defined('ABSPATH') or die("No script kiddies please!");
get_header(); 
if (AfterSetupTheme::mi_return_theme_option('slider_style')=='main'){
get_template_part('main-slider');
} elseif ((AfterSetupTheme::mi_return_theme_option('slider_style')=='slider2')) {
	get_template_part('main-slider');
}
?>
<?php get_template_part('banner-section');?>

		<section class="blog-content-wraper">
			<div class="container">
				<div class="row">
				
				
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="row">
							<div class="col-md-12">
							
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<!-- blog post one -->
								<div class="blog-post-box">
									<div class="blog-post-image">
										<?php $url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
											echo '<img class="img-responsive" src="'.$url.'" alt="Image">';
										?>
									</div>
									<div class="blog-post-inner">
										<div class="post-info info-width">
											<div class="author-image">
												<?php echo get_avatar( $id_or_email, $size, $default, $alt, $args ); ?> 
											</div>
											<div class="post-date">
												<span class="date"><?php the_time('d') ?></span><br>
												<span class="month"><?php the_time('M') ?></span>
											</div>
											<div class="post-quote">
												<?php
													if(has_post_format( 'video' )){
															echo'<div aria-hidden="true" data-icon="&#x49;"></div>';
															 
														}
														elseif(has_post_format( 'quote' )){
															echo'<div aria-hidden="true" data-icon="&#x7c;"></div>';
															
														}
														elseif(has_post_format( 'image' )){
															echo'<div aria-hidden="true" data-icon="&#xe006;"></div>';
															
														}
														else{
															echo'<div aria-hidden="true" data-icon="&#xe082;"></div>';
															
													}
												?>
					
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="blog-post-content">
											<a href="<?php the_permalink() ?>"><h3><?php the_title() ?></h3></a>
											<p><?php the_excerpt() ?></p>
											<div class="read-more">
												<a href="<?php the_permalink() ?>"><?php exc_html_e('read more','reversal')?></a>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<!-- end blog post one-->
								<?php endwhile;?>
								<?php endif;?>
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
					
					<?php get_sidebar();?>
				</div>
			</div>
		</section>

<?php get_footer();?>