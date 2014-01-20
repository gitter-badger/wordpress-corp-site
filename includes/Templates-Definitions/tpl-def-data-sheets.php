<?php

if (get_template_file() == "tpl-data_sheets.php")
{

    add_action('init', 'remove_editor_init');
    function remove_editor_init() {
        remove_post_type_support('page', 'editor');
    }

    add_filter( 'cmb_meta_boxes', 'cmb_data_sheets_page_metaboxes' );
    function cmb_data_sheets_page_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';

        array_push($meta_boxes, array(
            'id'         => $prefix .'header',
            'title'      => __( 'Header Settings'),
            'pages'      => array( 'page', ),
            'show_names' => false,
            'fields'     => array(
                array(
                    'name'    => __( 'Main Image'),
                    'id'      => $prefix . 'main_image',
                    'type'    => 'file',
                ),
                array(
                    'name'    => __( 'Main Image text'),
                    'id'      => $prefix . 'main_text',
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5, 'media_buttons' => false ),
                ),
            ),
        ));

        return $meta_boxes;
    }
}