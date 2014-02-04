<?php

	$videos = new Custom_Post_Type('video', array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => true,
		'show_in_menu' => true,
        'menu_position' => $position['video'],
        'menu_icon' => '',
		'rewrite' => array('slug' => 'resources/video')
	));


	add_filter( 'cmb_meta_boxes', 'cmb_videos_metaboxes' );
	function cmb_videos_metaboxes( array $meta_boxes )
	{

	    $prefix = '_cmb_';

	    $meta_boxes['videos_metabox'] = array(
	        'id'         => 'videos_icons',
	        'title'      => __( 'Icons', 'cmb' ),
	        'pages'      => array( 'video', ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true,
	        'fields'     => array(
	        	array(
                        'name' => __( 'Featured Video? ', 'cmb' ),
                        'id'   => $prefix . 'is_featured',
                        'type' => 'checkbox',
                ),
	            array(
                        'name' => __( 'Embedded Video URL', 'cmb' ),
                        'desc' => __( 'Enter a youtube or Vimeo URL.', 'cmb' ),
                        'id'   => $prefix . 'hp_video_embed',
                        'type' => 'oembed',
                ),
	        ),
	    );

	    return $meta_boxes;
	}