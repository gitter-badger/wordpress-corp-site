<?php

	$faq = new Custom_Post_Type('faq', array(
		'supports' => array('title','editor', 'excerpt', 'thumbnail'),
		'show_in_menu' => true,
        'menu_position' => $position['faq'],
        'menu_icon' => '',
		'rewrite' => true,
	));

	$faq->add_taxonomy('label');


