<?php defined('ABSPATH') or die("No script kiddies please!");

get_header(); 
get_template_part('menu-section');?>
<?php get_template_part('banner-section');?>
<section class="blog-content-wraper">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div class="single-blog-post">
                  
                  <!-- blog single post image slider -->
                  <div class="blog-post-slider">
                    <div id="blog-single-image-slide" class="carousel slide" data-ride="carousel">

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                          <img class="img-responsive" src="<?php echo $url ?>" alt="Image">
                           <?php } ?>
                          <div class="blog-post-slider-caption">
                            <h4><?php the_title();?></h4>
                          </div>
                        </div>                 
                       
                      </div>                     
                    </div>
                  </div>
                  <div class="single-blog-post-content">
                    <div class="admin-info">                      
                      <?php if(have_posts()): the_post(); ?>
                      <p class="admin-name">Posted by <span><?php the_author();?></span></p>
                       <?php endif; ?>
                      <p class="date"><?php the_date('F d, Y');?></p>
                      <div class="clearfix"></div>
                    </div>
                    <?php the_content();?>
                    
                    <div class="single-post-info">
                      <div class="tag-link">
                        <span><i class="fa fa-tags"></i></span>
                        <ul>
                          <li><a href="#"><?php 
                                                $counter=0;
                                                $posttags = get_the_tags();
                                                if ($posttags) {
                                                  foreach($posttags as $tag) {
                                                    if($counter!=0){
                                                     echo ',<li><a href="#"> ';
                                                     } 
                                                     echo $tag->name . '';
                                                     $counter++;
                                                    }
                                                }
                                                ?> </a></li>                          
                        </ul>
                      </div>                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="comment-section">
                    <?php  if ( comments_open() || get_comments_number() ) {
                    comments_template();
                  } ?>                     
                     
                    </div>
                  </div>
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
