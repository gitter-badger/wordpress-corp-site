<?php

	$careers = new Custom_Post_Type('career', array(
		'supports' => array('title'),
		'show_in_menu' => true,
        'menu_position' => $position['carrer'],
		'rewrite' => array('slug' => 'about/careers'),
        'menu_icon' => '',
	));

    $careers->add_taxonomy('careers');

	add_filter( 'cmb_meta_boxes', 'cmb_careers_metaboxes' );
    function cmb_careers_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        array_push($meta_boxes, array(
            'id'         => $prefix .'header',
            'title'      => __( 'Page settings'),
            'pages'      => array( 'career', ),
            'fields'     => array(
                array(
                    'name'    => __( 'Link'),
                    'desc'    => __( 'Link to ziprecruiter'),
                    'id'      => $prefix . 'job_link',
                    'type'    => 'text',
                ),
                array(
                    'name'    => __( 'Job Location'),
                    'desc'    => __( 'Location'),
                    'std' 	  => 'Computer/Software, Santa Monica, CA',
                    'id'      => $prefix . 'job_location',
                    'type'    => 'text',
                ),
            ),
        ));

        return $meta_boxes;
    }
