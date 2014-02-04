<?php

	$news = new Custom_Post_Type('news', array(
		'supports' => array('title', 'editor','excerpt'),
		'show_in_menu' => true,
        'menu_position' => $position['news'],
        'menu_icon' => '',
		'rewrite' => true
	));
