<?php

	$clients = new Custom_Post_Type('white_paper', array(
		'supports' => array('title', 'editor'),
		'show_in_menu' => 'convertro_settings',
		'rewrite' => array('slug' => 'resources/white-papers')
	));

	add_filter( 'cmb_meta_boxes', 'cmb_white_paper_metaboxes' );

	function cmb_white_paper_metaboxes( array $meta_boxes )
	{

		$prefix = '_cmb_';
		$orange = getColorBox('#EE7B21');
		$teal = getColorBox('#5DC1B4');
		$yellow = getColorBox('#FBC84E');
		$white = getColorBox('#FFFFFF');
		$pink = getColorBox('#EE576B');

		$meta_boxes['white_paper_metabox'] = array(
		    'id'         => 'white_paper_permalinks',
		    'title'      => __( 'Read more color', 'cmb' ),
		    'pages'      => array('white_paper'),
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
		        )
		    ),
		);

	return $meta_boxes;

	}
