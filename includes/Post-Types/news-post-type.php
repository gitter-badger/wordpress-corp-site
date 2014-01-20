<?php

	$news = new Custom_Post_Type('news', array(
		'supports' => array('title', 'editor','excerpt'),
		'show_in_menu' => 'convertro_settings',
		'rewrite' => array('slug' => 'resources/news')
	));
