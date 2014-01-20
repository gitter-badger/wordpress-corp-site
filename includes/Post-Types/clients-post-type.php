<?php

	$clients = new Custom_Post_Type('client', array(
		'supports' => array('title'),
		'show_in_menu' => 'convertro_settings',
		'rewrite' => array('slug' => 'clients')
	));

	add_filter( 'cmb_meta_boxes', 'cmb_clients_metaboxes' );
	function cmb_clients_metaboxes( array $meta_boxes )
	{

	    $prefix = '_cmb_';
	    $orange = getColorBox('#EE7B21');
		$teal = getColorBox('#5DC1B4');
		$yellow = getColorBox('#FBC84E');
		$white = getColorBox('#FFFFFF');
		$pink = getColorBox('#EE576B');

	    $meta_boxes['clients_metabox'] = array(
	        'id'         => 'clients_icons',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'client', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
	            array(
                    'name'    => __( 'Client logo Color', 'cmb' ),
                    'id'      => $prefix . 'client_logo_color',
                    'type'    => 'file',

	            ),
	            array(
                    'name' => __( 'Case study Url', 'cmb' ),
                    'desc' => __( 'Paste here the url to a related case study (optional)', 'cmb' ),
                    'id'   => $prefix . 'case_study_url',
                    'type' => 'text_url',
                ),

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
		        )
	        ),
	    );

	    return $meta_boxes;
	}