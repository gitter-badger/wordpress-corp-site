<?php

	$clients = new Custom_Post_Type('data_sheets', array(
		'supports' => array('title', 'editor', 'excerpt'),
		'show_in_menu' => true,
        'menu_position' => $position['data_sheet'],
        'menu_icon' => '',
		'rewrite' => array('slug' => 'resources/data-sheets')
	));

	add_filter( 'cmb_meta_boxes', 'cmb_data_sheets_metaboxes' );

	function cmb_data_sheets_metaboxes( array $meta_boxes )
	{

		$prefix = '_cmb_';
		$orange = getColorBox('#EE7B21');
		$teal = getColorBox('#5DC1B4');
		$yellow = getColorBox('#FBC84E');
		$white = getColorBox('#FFFFFF');
		$pink = getColorBox('#EE576B');

		$meta_boxes['data_sheets_metabox'] = array(
		    'id'         => 'data_sheets_permalinks',
		    'title'      => __( 'Read more color', 'cmb' ),
		    'pages'      => array('data_sheets'),
		    'context'    => 'normal',
		    'priority'   => 'high',
		    'show_names' => true,
		    'fields'     => array(
		        array(
		            'name' => __( 'Choose a color: ', 'cmb' ),
		            'id'   => $prefix . 'read_more_color',
		            'type' => 'radio',
		            'options' => array(
		                array(
		                    'name' => __('Orange ' . $orange, 'cmb'),
		                    'value' => 'orange'
		                ),
		                array(
		                    'name' => __('Teal ' . $teal, 'cmb'),
		                    'value' => 'teal'
		                ),
		                array(
		                    'name' => __('Yellow ' . $yellow, 'cmb'),
		                    'value' => 'yellow'
		                ),
		                array(
		                    'name' => __('White ' . $white, 'cmb'),
		                    'value' => 'white'
		                ),
		                array(
		                    'name' => __('Pink ' . $pink, 'cmb'),
		                    'value' => 'pink'
		                ),
		            ),
		        ),
		        array(
	                    'name' => __( 'Icon - Idle', 'cmb' ),
	                    'desc' => __( 'Upload icon for idle state', 'cmb' ),
	                    'id'   => $prefix . 'icon_off',
	                    'type' => 'file',
	            ),
	            array(
	                    'name'    => __( 'Icon - Active', 'cmb' ),
	                    'desc'    => __( 'Upload icon for active state', 'cmb' ),
	                    'id'      => $prefix . 'icon_on',
	                    'type'    => 'file',

	            )
		    ),
		);

	return $meta_boxes;

	}
