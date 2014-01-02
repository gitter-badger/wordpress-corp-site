<?php

// ref: http://www.dwuser.com/education/content/quick-guide-adding-smooth-scrolling-to-your-webpages/
wp_enqueue_script( 'script-name', get_template_directory_uri() . '/javascripts/vendor/smoothscroll.js');
wp_enqueue_style(
	'convertro-style',
	get_bloginfo( 'stylesheet_url' )
);
