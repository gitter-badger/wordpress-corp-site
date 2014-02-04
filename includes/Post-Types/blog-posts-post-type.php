<?php

	$blogPost = new Custom_Post_Type('blog posts', array(
		'supports' => array('title','editor', 'excerpt', 'thumbnail', 'author'),
		'show_in_menu' => true,
        'menu_position' => $position['team'],
        'menu_icon' => '',
        'rewrite' => true,
	));

	$blogPost->add_taxonomy('category', array('hierarchical'=>true));
	$blogPost->add_taxonomy('tags');

	add_filter( 'cmb_meta_boxes', 'cmb_blog_posts_metaboxes' );
    function cmb_blog_posts_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        array_push($meta_boxes, array(
            'id'         => $prefix .'options',
            'title'      => __( 'Options'),
            'pages'      => array( 'blog_posts', ),
            'fields'     => array(
                array(
                    'name'    => __('Is featured post?'),
                    'desc' => __('If checked will appear at the top of the Blog page'),
                    'id'      => $prefix . 'is_featured',
                    'type'    => 'checkbox',
                ),
            ),
        ));

        return $meta_boxes;
    }

