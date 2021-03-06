<?php
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );

function YOUR_PREFIX_register_meta_boxes()
{
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	$prefix = 'YOUR_PREFIX_';
	$meta_box = array(
		'title' => __( 'Date Time Picker With JS Options', 'reversal' ),

		'fields' => array(
			array(
				'name' => __( 'Date', 'reversal' ),
				'id'   => $prefix . 'date',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'reversal' ),
					'autoSize'        => true,
					'buttonText'      => __( 'Select Date', 'reversal' ),
					'dateFormat'      => __( 'yy-mm-dd', 'reversal' ),
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			array(
				'name' => __( 'Datetime', 'reversal' ),
				'id'   => $prefix . 'datetime',
				'type' => 'datetime',

				// jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			array(
				'name' => __( 'Time', 'reversal' ),
				'id'   => $prefix . 'time',
				'type' => 'time',

				// jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
		),
	);

	new RW_Meta_Box( $meta_box );
}
