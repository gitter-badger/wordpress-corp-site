<?php
if (get_template_file() == "tpl-home.php")
{
    add_filter( 'cmb_meta_boxes', 'cmb_hp_metaboxes' );
    function cmb_hp_metaboxes( array $meta_boxes )
    {
        $prefix = '_cmb_';
        $meta_boxes['hp_metabox'] = array(
            'id'         => 'test_metabox',
            'title'      => __( 'Home page settings', 'cmb' ),
            'pages'      => array( 'page', ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                        'name' => __( 'Embedded Video URL', 'cmb' ),
                        'desc' => __( 'Enter a youtube or Vimeo URL.', 'cmb' ),
                        'id'   => $prefix . 'hp_video_embed',
                        'type' => 'oembed',
                ),
                array(
                        'name'    => __( 'Our differences', 'cmb' ),
                        'desc'    => __( 'This text will appear in the home page in the "Our Differences" section', 'cmb' ),
                        'id'      => $prefix . 'hp_our_differences',
                        'type'    => 'wysiwyg',
                        'options' => array('textarea_rows' => 5, ),
                ),
            ),
        );

        return $meta_boxes;
    }
}