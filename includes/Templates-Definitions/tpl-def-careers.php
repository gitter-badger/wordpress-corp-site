<?php

if (get_template_file() == "tpl-careers.php")
{

    add_action('init', 'remove_editor_init');
    function remove_editor_init() {
        remove_post_type_support('page', 'editor');
    }

    add_filter( 'cmb_meta_boxes', 'cmb_careers_page_metaboxes' );
    function cmb_careers_page_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        $meta_boxes['hp_metabox'] = array(
            'id'         => 'test_metabox',
            'title'      => __( 'careers page settings', 'cmb' ),
            'pages'      => array( 'page', ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => __( 'Main Image', 'cmb' ),
                    'id'      => $prefix . 'main_image',
                    'type'    => 'file',
                ),
                array(
                    'name'    => __( 'Main Image text', 'cmb' ),
                    'id'      => $prefix . 'main_text',
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5, 'media_buttons' => false ),
                ),
            ),
        );

        return $meta_boxes;
    }

}