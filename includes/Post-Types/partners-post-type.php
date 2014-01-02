<?php

	$partners = new Custom_Post_Type('partner', array(
		'supports' => array('title')
	));

	add_filter( 'cmb_meta_boxes', 'cmb_partners_metaboxes' );
	function cmb_partners_metaboxes( array $meta_boxes )
	{

	    $prefix = '_cmb_';

	    $meta_boxes['partners_metabox'] = array(
	        'id'         => 'partners_icons',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'partner', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
	            array(
                    'name'    => __( 'Partner logo Color', 'cmb' ),
                    'id'      => $prefix . 'partner_logo_color',
                    'type'    => 'file',

	            )
	        ),
	    );

	    return $meta_boxes;
	}