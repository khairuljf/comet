<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */



/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);


/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Slider Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Open as a Separate Page',
			'id'		=> $prefix . 'separate_page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),

		

				
	)
);

/* ----------------------------------------------------- */
// Blog Post Metaboxes
/* ----------------------------------------------------- */

/*  Blog Link Post Settings */

$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-link',
	'title' => 'Post Custom Field',
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Post Author Image Link :',
			'id'		=> $prefix . 'postimg',
			'desc'		=> 'Write Post Author Image Link Here',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),

		array(
			'name'		=> 'Put your Vimeo Video Embeded Code :',
			'id'		=> $prefix . 'postvideosource',
			'desc'		=> 'Write Vimeo Video embeded code ',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
	)
);
/*  Blog Quote Post Settings */


/* ----------------------------------------------------- */
/* Portfolio One Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_info',
	'title' => 'Project Details',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(

		
		array(
			'name'		=> 'Client Name :',
			'id'		=> $prefix . 'proclient',
			'desc'		=> 'Write Your Project Client Name',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Release Date :',
			'id'		=> $prefix . 'prord',
			'desc'		=> 'Write Your Project Client Organization',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Site Url:',
			'id'		=> $prefix . 'prosur',
			'desc'		=> 'Write Your Client Image Url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
	)
);



/* ----------------------------------------------------- */
/* Resume Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'resume_info',
	'title' => 'Experience Details',
	'pages' => array( 'team' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Designation :',
			'id'		=> $prefix . 'dg_name',
			'desc'		=> 'Write Team Member Designation (Eg. Web Engineer, Author, Editor etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		
	)
);

/* ----------------------------------------------------- */
/* Testimonial Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'testimonial_info',
	'title' => 'Testimonial Details',
	'pages' => array( 'testimonial' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Org: Nmae :',
			'id'		=> $prefix . 'organi_name',
			'desc'		=> 'Write Your Organization Name (Eg. Google Inc., Microsoft Inc. etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
			
		
	)
);




/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function rocknrolla_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'rocknrolla_register_meta_boxes' );