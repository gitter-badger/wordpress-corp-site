<?php

if (get_template_file() == "tpl-about.php")
{
    add_action('init', 'remove_editor_init');
    function remove_editor_init() {
        remove_post_type_support('page', 'editor');
    }

    add_filter( 'cmb_meta_boxes', 'cmb_about_metaboxes' );
    function cmb_about_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        $meta_boxes['hp_metabox'] = array(
            'id'         => 'test_metabox',
            'title'      => __( 'About page settings', 'cmb' ),
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
                array(
                    'name'    => __( 'Story - Thumbnail', 'cmb' ),
                    'id'      => $prefix . 'story_thumb',
                    'type'    => 'file',
                ),
                array(
                    'name'    => __( 'Story - Citation', 'cmb' ),
                    'id'      => $prefix . 'story_citation',
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5, 'media_buttons' => false ),
                ),
                array(
                    'name'    => __( 'Story - Text', 'cmb' ),
                    'id'      => $prefix . 'story_text',
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5, 'media_buttons' => false ),
                ),


            ),
        );

        return $meta_boxes;
    }
}