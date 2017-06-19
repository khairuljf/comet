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
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'YOUR_PREFIX_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Standard Fields', 'reversal' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post', 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Text', 'reversal' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text",
			// Field description (optional)
			'desc'  => __( 'Text description', 'reversal' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Default text value', 'reversal' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),
		// CHECKBOX
		array(
			'name' => __( 'Checkbox', 'reversal' ),
			'id'   => "{$prefix}checkbox",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 1,
		),
		// RADIO BUTTONS
		array(
			'name'    => __( 'Radio', 'reversal' ),
			'id'      => "{$prefix}radio",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'reversal' ),
				'value2' => __( 'Label2', 'reversal' ),
			),
		),
		// SELECT BOX
		array(
			'name'     => __( 'Select', 'reversal' ),
			'id'       => "{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'reversal' ),
				'value2' => __( 'Label2', 'reversal' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'value2',
			'placeholder' => __( 'Select an Item', 'reversal' ),
		),
		// HIDDEN
		array(
			'id'   => "{$prefix}hidden",
			'type' => 'hidden',
			// Hidden field must have predefined value
			'std'  => __( 'Hidden value', 'reversal' ),
		),
		// PASSWORD
		array(
			'name' => __( 'Password', 'reversal' ),
			'id'   => "{$prefix}password",
			'type' => 'password',
		),
		// TEXTAREA
		array(
			'name' => __( 'Textarea', 'reversal' ),
			'desc' => __( 'Textarea description', 'reversal' ),
			'id'   => "{$prefix}textarea",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => __( 'Password is required', 'reversal' ),
				'minlength' => __( 'Password must be at least 7 characters', 'reversal' ),
			),
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'reversal' ),

	'fields' => array(
		// HEADING
		array(
			'type' => 'heading',
			'name' => __( 'Heading', 'reversal' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),
		// SLIDER
		array(
			'name' => __( 'Slider', 'reversal' ),
			'id'   => "{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '$', 'reversal' ),
			'suffix' => __( ' USD', 'reversal' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 10,
				'max'   => 255,
				'step'  => 5,
			),
		),
		// NUMBER
		array(
			'name' => __( 'Number', 'reversal' ),
			'id'   => "{$prefix}number",
			'type' => 'number',

			'min'  => 0,
			'step' => 5,
		),
		// DATE
		array(
			'name' => __( 'Date picker', 'reversal' ),
			'id'   => "{$prefix}date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( '(yyyy-mm-dd)', 'reversal' ),
				'dateFormat'      => __( 'yy-mm-dd', 'reversal' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		// DATETIME
		array(
			'name' => __( 'Datetime picker', 'reversal' ),
			'id'   => $prefix . 'datetime',
			'type' => 'datetime',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute'     => 15,
				'showTimepicker' => true,
			),
		),
		// TIME
		array(
			'name' => __( 'Time picker', 'reversal' ),
			'id'   => $prefix . 'time',
			'type' => 'time',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute' => 5,
				'showSecond' => true,
				'stepSecond' => 10,
			),
		),
		// COLOR
		array(
			'name' => __( 'Color picker', 'reversal' ),
			'id'   => "{$prefix}color",
			'type' => 'color',
		),
		// CHECKBOX LIST
		array(
			'name' => __( 'Checkbox list', 'reversal' ),
			'id'   => "{$prefix}checkbox_list",
			'type' => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'reversal' ),
				'value2' => __( 'Label2', 'reversal' ),
			),
		),
		// EMAIL
		array(
			'name'  => __( 'Email', 'reversal' ),
			'id'    => "{$prefix}email",
			'desc'  => __( 'Email description', 'reversal' ),
			'type'  => 'email',
			'std'   => 'name@email.com',
		),
		// RANGE
		array(
			'name'  => __( 'Range', 'reversal' ),
			'id'    => "{$prefix}range",
			'desc'  => __( 'Range description', 'reversal' ),
			'type'  => 'range',
			'min'   => 0,
			'max'   => 100,
			'step'  => 5,
			'std'   => 0,
		),
		// URL
		array(
			'name'  => __( 'URL', 'reversal' ),
			'id'    => "{$prefix}url",
			'desc'  => __( 'URL description', 'reversal' ),
			'type'  => 'url',
			'std'   => 'http://google.com',
		),
		// OEMBED
		array(
			'name'  => __( 'oEmbed', 'reversal' ),
			'id'    => "{$prefix}oembed",
			'desc'  => __( 'oEmbed description', 'reversal' ),
			'type'  => 'oembed',
		),
		// SELECT ADVANCED BOX
		array(
			'name'     => __( 'Select', 'reversal' ),
			'id'       => "{$prefix}select_advanced",
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'reversal' ),
				'value2' => __( 'Label2', 'reversal' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			// 'std'         => 'value2', // Default value, optional
			'placeholder' => __( 'Select an Item', 'reversal' ),
		),
		// TAXONOMY
		array(
			'name'    => __( 'Taxonomy', 'reversal' ),
			'id'      => "{$prefix}taxonomy",
			'type'    => 'taxonomy',
			'options' => array(
				// Taxonomy name
				'taxonomy' => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'args' => array()
			),
		),
		// POST
		array(
			'name'    => __( 'Posts (Pages)', 'reversal' ),
			'id'      => "{$prefix}pages",
			'type'    => 'post',

			// Post type
			'post_type' => 'page',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'WYSIWYG / Rich Text Editor', 'reversal' ),
			'id'   => "{$prefix}wysiwyg",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( 'WYSIWYG default value', 'reversal' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		// DIVIDER
		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id', // Not used, but needed
		),
		// FILE UPLOAD
		array(
			'name' => __( 'File Upload', 'reversal' ),
			'id'   => "{$prefix}file",
			'type' => 'file',
		),
		// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'File Advanced Upload', 'reversal' ),
			'id'   => "{$prefix}file_advanced",
			'type' => 'file_advanced',
			'max_file_uploads' => 4,
			'mime_type' => 'application,audio,video', // Leave blank for all file types
		),
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image Upload', 'reversal' ),
			'id'   => "{$prefix}image",
			'type' => 'image',
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => __( 'Thickbox Image Upload', 'reversal' ),
			'id'   => "{$prefix}thickbox",
			'type' => 'thickbox_image',
		),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( 'Plupload Image Upload', 'reversal' ),
			'id'               => "{$prefix}plupload",
			'type'             => 'plupload_image',
			'max_file_uploads' => 4,
		),
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'Image Advanced Upload', 'reversal' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
		// BUTTON
		array(
			'id'   => "{$prefix}button",
			'type' => 'button',
			'name' => ' ', // Empty name will "align" the button to all field inputs
		),

	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
