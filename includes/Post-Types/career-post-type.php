<?php

	$careers = new Custom_Post_Type('career', array(
		'supports' => array('title','editor','thumbnail'),
		'has_archive' => true,
	));
	$careers->add_meta_box(
		'Team member Info',
		array(
			'Title' => 'text',
			'Description' => 'textarea',
			'Link' => 'text'
		)
	);