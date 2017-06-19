<div class="ajax-popup blog-single">

	<div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
			
				<?php $url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
					<img class="img-responsive" src="<?php echo $url ?>" alt="logo">								
            </div>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="project-details">
					<h3><?php _e('Project Name: ','reversal')?><?php the_title(); ?></h3>
					<div class="project-date">
						<p class="project-date-details"><span><?php the_date('d') ?></span>&nbsp;<?php echo get_the_date('F, Y') ?></p>
					</div>
					<h4><?php _e('Project Description & Details','reversal')?></h4>
					<p><?php the_content(); ?></p>
					
					<table class="single-author-info">
						<tr>
							<td><strong><?php _e('Client','reversal')?></strong></td>
							<td><?php echo get_post_meta($post->ID, 'rnr_proclient', true);?></td> 
						</tr>
						<tr>
							<td><strong><?php _e('Skills','reversal')?></strong></td>
							<td><?php $portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
					                    if ($portfolio_category) {
					                      foreach($portfolio_category as $item) {?>
					                     <?php  if($counter != 0){
                                                     echo ', ';
                                                     }
					                        echo esc_attr($item->name . ' ');
					                        $counter++; 
					                      }?>
					                   
					                    <?php }
					                    ?></td> 
						</tr>
						<tr>
							<td><strong><?php _e('Date','reversal')?></strong></td>
							<td><?php echo get_post_meta($post->ID, 'rnr_prord', true);?></td>
						</tr>						
						<tr>
							<td><strong><?php _e('Url','reversal')?></strong></td>
							<td><?php echo get_post_meta($post->ID, 'rnr_prosur', true);?></td>
						</tr>
						<tr>
							<td><strong><?php _e('Copyright','reversal')?></strong></td>
							<td><?php the_author(); ?></td>
						</tr>
					</table>
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