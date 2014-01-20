<?php

if (get_template_file() == "tpl-case_study.php")
{

    add_filter( 'cmb_meta_boxes', 'cmb_case_study_page_metaboxes' );
    function cmb_case_study_page_metaboxes( array $meta_boxes )
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