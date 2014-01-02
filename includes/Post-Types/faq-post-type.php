<?php

	$faq = new Custom_Post_Type('faq', array(
		'supports' => array('title','editor', 'excerpt', 'thumbnail'),
		'has_archive' => true,
	));

	$faq->add_taxonomy('label');


