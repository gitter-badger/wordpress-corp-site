<?php

	$strengths = new Custom_Post_Type('strength', array(
		'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
		'show_in_menu' => true,
        'menu_position' => $position['strength'],
        'menu_icon' => '',
	));


	add_filter( 'cmb_meta_boxes', 'cmb_strengths_metaboxes' );
	function cmb_strengths_metaboxes( array $meta_boxes )
	{


	    $prefix = '_cmb_';
	    $meta_boxes['strengths_metabox'] = array(
	        'id'         => 'strengths_icons',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'strength', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
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



