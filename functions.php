<?php


add_action( 'wp_enqueue_scripts', 'convertro_enqueue_scripts' );
add_action( 'after_setup_theme', 'convertro_setup' );
add_action('init', 'on_init');

if ( ! function_exists( 'convertro_enqueue_scripts' ) ) :
    function convertro_enqueue_scripts() {
        if ( ! is_admin() ) {
            require_once('includes/enqueue-scripts.php');
        }
    }
endif;

if ( ! function_exists( 'convertro_setup' ) ) :
    function convertro_setup() {
    	add_theme_support( 'post-thumbnails' );
        add_image_size( 'team-member-thumb', 60, 73 );
        add_image_size( 'video-large', 400, 240, true );
        add_image_size( 'video-normal', 200, 120, true );

        require_once('includes/menus.php');
    }
endif;

function on_init(){
	if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'includes/Custom-Metaboxes/init.php';
}

function get_id() {
    $post_id = null;
    if (isset($_GET['post']) || isset($_POST['post_ID']))
    {
        $post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];
    }
    return $post_id;
}

function get_template_file()
{
    $post_id = null;
    if (isset($_GET['post']) || isset($_POST['post_ID']))
    {
        $post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];
        $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
        return $template_file;
    }
    return '';
}

function getColorBox($color)
{
    return '<span style="display:inline-block; width: 16px; height: 16px; background:'.$color.'; margin-left: 5px;"></span>';
}

function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

function limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

function get_pagination($queryObject, $format) {
    $paging = paginate_links( array(
        'base' => str_replace( 90, '%#%', esc_url( get_pagenum_link( 90 ) ) ),
        'format' => '?'.$format.'=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $queryObject->max_num_pages
    ) );
    return $paging;
}


function get_sticky_posts($postsPerPage) {
    $sticky = get_option( 'sticky_posts' );
    $q = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'post__in' => $sticky
    ));
    return $q;
}

function get_all_posts($postsPerPage) {
    $sticky = get_option( 'sticky_posts' );
    $q = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'post__not_in' => $sticky
    ));
    return $q;
}

function get_demo_link($className, $link, $text) {
    $buff = '<a class="demo-link ' . $className . '" href="' . $link . '">' . $text;
        $buff .= '<svg class="tip" height="26" width="14">';
        $buff .= '<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/></svg>';
    $buff .= '</a>';
    return $buff;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function set_widgets_init() {

    register_sidebar( array(
        'name' => 'Blog sidebar',
        'id' => 'blog_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Pages custom navigation',
        'id' => 'pages_custom_navigation',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'General page sidebar',
        'id' => 'general_page_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Left sidebar',
        'id' => 'footer_left_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'set_widgets_init' );


function tag_cloud_highlight($cloud){


    if(!is_tax('label')) {
        return $cloud;
    }
    $terms = get_terms('label');
    if(!$terms) {
        return $cloud;
    }
    foreach($terms as $category) {
        if(is_tax('label',$category->slug)) {
            $cloud = str_replace("tag-link-$category->term_id", "current-cloud-term tag-link-$category->term_id",$cloud);
        }
    }
    return $cloud;
}

add_filter('wp_tag_cloud','tag_cloud_highlight');


require_once('includes/shortcodes.php');
require_once('includes/Post-Types/custom-post-type.php');
require_once('includes/Post-Types/team-post-type.php');
require_once('includes/Post-Types/clients-post-type.php');
require_once('includes/Post-Types/partners-post-type.php');
require_once('includes/Post-Types/career-post-type.php');
require_once('includes/Post-Types/case-studies-post-type.php');
require_once('includes/Post-Types/strengths-post-type.php');
require_once('includes/Post-Types/videos-post-type.php');
require_once('includes/Post-Types/news-post-type.php');
require_once('includes/Post-Types/white-papers-post-type.php');
require_once('includes/Post-Types/difference-post-type.php');
require_once('includes/Post-Types/faq-post-type.php');


require_once('includes/Templates-Definitions/tpl-def-about.php');
require_once('includes/Templates-Definitions/tpl-def-home.php');
require_once('includes/Templates-Definitions/tpl-def-resources.php');






