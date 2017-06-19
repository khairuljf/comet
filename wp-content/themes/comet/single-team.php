<div class="ajax-popup team-single">

	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			
				<?php $url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
					<img class="img-responsive" src="<?php echo $url ?>" alt="logo">								
            </div>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="member-details">
					
					<div class="member-name">
						<h3><?php the_title(); ?></h3>
					</div>
					<table class="single-author-info">
						<tr>
							<td><strong><?php _e('Designation :','reversal')?></strong></td>
							<td><?php echo get_post_meta($post->ID, 'rnr_dg_name', true);?></td> 
						</tr>
						
					</table>
					<h4><?php _e('About','reversal')?> <?php the_title(); ?></h4>

					<p><?php the_content(); ?></p>
					
					
				</div>
            </div>
        </div>
    </div>
	<?php endwhile;?>
	<?php endif;?>
	
    <div class="popup-close">
        <a class="ajax-popup-dismiss" href="#">
            <i class="fa fa-close"></i>
        </a>
    </div>
</div>