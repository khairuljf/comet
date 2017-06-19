<?php defined('ABSPATH') or die("No script kiddies please!");?>
<!DOCTYPE html>
<html
<?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description"
	content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
<!-- The favicon -->
<link rel="shortcut icon" href="<?php echo esc_url(AfterSetupTheme::mi_return_theme_option('favicon','url'));?>" type="image/x-icon">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
<style type="text/css">
.section-header-title h1::after{
	content: url('<?php echo esc_url(AfterSetupTheme::mi_return_theme_option('hlogo','url'));?>');
	}
.section-header-title h3::after{
	content: url('<?php echo esc_url(AfterSetupTheme::mi_return_theme_option('hlogo','url'));?>');
	}
.blog-header-title h1::after{
	content: url('<?php echo esc_url(AfterSetupTheme::mi_return_theme_option('hlogo','url'));?>');
	}
</style>
</head>
<body <?php body_class(); ?>>

<!-- End Page Loader -->

    