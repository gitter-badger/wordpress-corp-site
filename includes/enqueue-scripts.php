<?php

// ref: http://www.dwuser.com/education/content/quick-guide-adding-smooth-scrolling-to-your-webpages/

wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', false, '2');

wp_enqueue_script('jquery');

wp_enqueue_script( 'script-name', get_template_directory_uri() . '/javascripts/vendor/smoothscroll.js', array('jquery'));

wp_enqueue_script('bootstrap', get_template_directory_uri() . "/javascripts/vendor/bootstrap.min.js", array( 'jquery' ) );

wp_enqueue_script('backbone', get_template_directory_uri() . "/javascripts/vendor/backbone.js");

wp_enqueue_script('fetch-form', get_template_directory_uri() . "/javascripts/fetch-form.js", array( 'jquery','backbone' ) );

wp_localize_script( 'fetch-form', 'CVO', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );