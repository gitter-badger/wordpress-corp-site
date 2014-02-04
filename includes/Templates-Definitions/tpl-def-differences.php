<?php

if (get_template_file() == "tpl-differences.php")
{

    add_filter( 'cmb_meta_boxes', 'cmb_differences_page_metaboxes' );
    function cmb_differences_page_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        $orange = getColorBox('#EE7B21');
        $teal = getColorBox('#5DC1B4');
        $yellow = getColorBox('#FBC84E');
        $white = getColorBox('#FFFFFF');
        $pink = getColorBox('#EE576B');

        array_push($meta_boxes, array(
            'id'         => $prefix .'colors',
            'title'      => __( 'Color', 'cmb' ),
            'pages'      => array( 'page'),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => __( 'Choose a color: ', 'cmb' ),
                    'id'   => $prefix . 'colors',
                    'type' => 'radio',
                    'options' => array(
                        array(
                            'name' => __('Orange ' . $orange, 'cmb'),
                            'value' => 'orange'
                        ),
                        array(
                            'name' => __('Teal ' . $teal, 'cmb'),
                            'value' => 'teal'
                        ),
                        array(
                            'name' => __('Yellow ' . $yellow, 'cmb'),
                            'value' => 'yellow'
                        ),
                        array(
                            'name' => __('White ' . $white, 'cmb'),
                            'value' => 'white'
                        ),
                        array(
                            'name' => __('Pink ' . $pink, 'cmb'),
                            'value' => 'pink'
                        ),
                    ),
                )
            )
        ));

        array_push($meta_boxes, array(
            'id'         => $prefix .'content',
            'title'      => __( 'Excerpt'),
            'pages'      => array( 'page', ),
            'show_names' => false,
            'fields'     => array(
                array(
                    'name'    => __( 'Excerpt'),
                    'id'      => $prefix . 'excerpt',
                    'desc'       => __('Will be used on the Homepage and lists'),
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5, 'media_buttons' => false, 'teeny' => true),
                ),

            ),
        ));

        array_push($meta_boxes, array(
            'id'         => $prefix .'icons',
            'title'      => __( 'Icon'),
            'pages'      => array( 'page', ),
            'show_names' => false,
            'fields'     => array(

                array(
                        'name' => __( 'Icon', 'cmb' ),
                        'desc' => __( 'Upload icon', 'cmb' ),
                        'id'   => $prefix . 'icon_off',
                        'type' => 'file',
                ),
             ),
        ));


        array_push($meta_boxes, array(
            'id'         => $prefix .'header',
            'title'      => __( 'Header'),
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