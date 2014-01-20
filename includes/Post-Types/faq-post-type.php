<?php

	$faq = new Custom_Post_Type('faq', array(
		'supports' => array('title','editor', 'excerpt', 'thumbnail'),
		'show_in_menu' => 'convertro_settings',
		'rewrite' => array('slug' => 'resources/faq')
	));

	$faq->add_taxonomy('label');


