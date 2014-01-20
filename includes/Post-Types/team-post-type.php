<?php

	$team = new Custom_Post_Type('team member', array(
		'supports' => array('title'),
		'show_in_menu' => 'convertro_settings',
	));


	add_filter( 'cmb_meta_boxes', 'cmb_team_metaboxes' );
	function cmb_team_metaboxes( array $meta_boxes )
	{
	    $prefix = '_cmb_';
	    $meta_boxes['team_metabox'] = array(
	        'id'         => 'team_member',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'team_member', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
	        	array(
	                    'name' => __( 'Name', 'cmb' ),
	                    'id'   => $prefix . 'member_name',
	                    'type' => 'text',
	            ),
	            array(
	                    'name' => __( 'Job Title', 'cmb' ),
	                    'id'   => $prefix . 'member_title',
	                    'type' => 'text',
	            ),
	            array(
	                    'name' => __( 'Photo', 'cmb' ),
	                    'id'   => $prefix . 'member_photo',
	                    'type' => 'file',
	            ),
	            array(
	                    'name'    => __( 'Job Description', 'cmb' ),
	                    'desc' => __('500 characters maximum.','cmb'),
	                    'id'      => $prefix . 'member_job_description',
	                    'type'    => 'wysiwyg',
	                    'options' => array('textarea_rows' => 10, 'media_buttons' => false),
	            ),
				array(
                    'name' => 'Group',
                    'desc' => 'Executives / team',
                    'id' => $prefix . 'member_group',
                    'type' => 'select',
                    'options' => array(
                        array('name' => 'Member', 'value' => 'member'),
                        array('name' => 'Executive', 'value' => 'executive'),
                    )
                ),
	        ),
	    );

	    return $meta_boxes;
	}
