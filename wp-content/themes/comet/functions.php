<?php
defined('ABSPATH') or die("No script kiddies please!");


include_once 'includes/includecss.php';
include_once 'includes/includejs.php';
include_once 'includes/aftersetuptheme.php';
include_once 'includes/CreateCustomPostType.php';
//include_once 'includes/navigation.php';
include_once 'includes/metaboxes.php';
include_once 'includes/overridewidgets.php';
include_once 'includes/resetquery.php';
include_once 'symple-shortcodes/symple-shortcodes.php';
include_once 'includes/sample-config.php';
include_once 'includes/class-tgm-plugin-activation.php';
include_once 'includes/themeplugins.php';
///// ********** add actions ************* ////



add_action('after_setup_theme', 'AfterSetupTheme::mi_add_theme_support');


// For one page

class mi_description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
            if( $icon_class != '' ) {
              $icon_classes = '<i class="'. $icon_class .'"></i>';
        }
        else{
          $icon_classes = '';
        }

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "rnr_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
        $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                  if ( $separate_page == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"';                     
                    else 
                      $attributes .= ' href="' . home_url() .'/#' .$varpost->post_name . '"';
                  } 

                  $object_output = $args->before;
                $object_output .= '<a'. $attributes .'>';
                $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }
           else{

              $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                $attributes .= ! empty( $object->url ) ? ' href="' . esc_attr( $object->url ) .'"' : '';

              $object_output = $args->before;
              $object_output .= '<a'. $attributes .'>';
              $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
              $object_output .= $args->link_after;
              $object_output .= '</a>';
              $object_output .= $args->after;

               $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
          }

           
      }
}

// How comments are displayed


function reversal_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'media comment-author';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="media comment-author">
    <?php endif; ?>
    <div class="media-left">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="media-body">
    <?php printf(__('<h4 class="media-heading">%s</h4>','reversal'), get_comment_author_link()) ?>
    <p class="comment-date">
      <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s','reversal'), get_comment_date()) ?>      
    </p>
    <?php comment_text() ?>    
    <div class="reply-button">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    </div>   
    
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','reversal') ?></em>
    <br />
<?php endif; ?>

    

    
    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
        }