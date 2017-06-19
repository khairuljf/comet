<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','reversal'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	
	<h4><?php	printf( _n( 'ONE COMMENT%2$s', ' COMMENTS (%1$s)','reversal', get_comments_number() ),
									number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;', ); ?></h4>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<div class="post-comment-wraper">
		<ul class="media-list">
	<?php wp_list_comments('callback=reversal_comment');?>
		</ul>
	</div>

	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','reversal'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div class="send-post-comment">

<h4><?php comment_form_title( __('LEAVE A COMMENT','reversal'), __('Leave A Comment to %s','reversal' ) ); ?></h4>

<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.','reversal'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>
<div class="fill-comment-form">
<div class="contact-form">
<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.','reversal'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account','reversal'); ?>"><?php _e('Log out &raquo;','reversal'); ?></a></p>

<?php else : ?>
<div class="row">
	<div class="col-md-6">
	<div class="form-group">
<input class="form-control"  placeholder="Name" type="text" name="author" id="name" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
<input class="form-control"  placeholder="Your email here" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	</div>
	</div>

<div class="col-md-6">
	<div class="form-group">
<input class="form-control"  placeholder="Phone" type="tel" name="phone" id="telephone" value="<?php echo  esc_attr($comment_author); ?>" size="22" tabindex="3" />

	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
<input class="form-control"  placeholder="Subject" type="text" name="subject" id="subject" value="<?php echo  esc_attr($comment_author); ?>" size="22" tabindex="3" />

	</div>
</div>
</div>
<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>','reversal'), allowed_tags()); ?></small></p>-->
<div class="row">
	<div class="col-md-12">
	<div class="form-group">
<textarea class="form-control" rows="5" name="comment" id="comment" cols="100" tabindex="4" placeholder="<?php echo __('Comment...', 'reversal'); ?>"></textarea></p>
	</div>
</div>
</div>
<div class="row">
	<div class="col-md-12">
	<div class="form-group">
<input class="submit-button" name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Now','reversal'); ?>" />
<?php comment_id_fields(); ?>
	</div>
	</div>
</div>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
</div>
<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
