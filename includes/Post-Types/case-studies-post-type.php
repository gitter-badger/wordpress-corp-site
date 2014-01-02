<?php

	$caseStudies = new Custom_Post_Type('case study', array(
		'supports' => array('title','editor', 'excerpt', 'thumbnail'),
		'has_archive' => true,
	));
	$caseStudies->add_meta_box(
		'Case Study Info',
		array(
			'Increase' => 'text'
		)
	);

	add_filter( 'cmb_meta_boxes', 'cmb_case_study_metaboxes' );
	function cmb_case_study_metaboxes( array $meta_boxes )
	{

	    $prefix = '_cmb_';
		$gray = getColorBox('#787878');
		$teal = getColorBox('#5DC1B4');

	    $meta_boxes['case_study_metabox'] = array(
	        'id'         => 'case_study_meta',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'case_study', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
	            array(
	                    'name' => __( 'Icon', 'cmb' ),
	                    'desc' => __( 'Upload an icon', 'cmb' ),
	                    'id'   => $prefix . 'icon',
	                    'type' => 'file',
	            ),
	        ),
	    );

		$meta_boxes['case_study_colors'] = array(
	        'id'         => 'case_study_colors',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'case_study', ),
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
		                    'name' => __('Gray ' . $gray, 'cmb'),
		                    'value' => 'gray'
		                ),
		                array(
		                    'name' => __('Teal ' . $teal, 'cmb'),
		                    'value' => 'teal'
		                ),
		            ),
		        )
	        ),
	    );

	    return $meta_boxes;
	}
