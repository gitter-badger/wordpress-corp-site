<?php
session_start();
if (!isset($_SESSION['data-sheets'])) {
    $_SESSION['data-sheets'] = array();
}
$COLOR_CLASSES = array('pink', 'orange', 'yellow', 'teal');

add_action( 'wp_enqueue_scripts', 'convertro_enqueue_scripts' );
add_action( 'after_setup_theme', 'convertro_setup' );
add_action('init', 'on_init');

function contacts_table () {
   global $wpdb;

   $table_name = $wpdb->prefix . "cvo_contacts";
   $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      name tinytext NOT NULL,
      email VARCHAR(100) NOT NULL,
      company VARCHAR(100) DEFAULT '' NOT NULL,
      item_id mediumint(9) NOT NULL,
      title VARCHAR(255) NOT NULL,
      UNIQUE KEY id (id)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
// Invokes only on theme activation
add_action("after_switch_theme", "contacts_table", 10 ,  2);



if ( ! function_exists( 'convertro_enqueue_scripts' ) ) :
    function convertro_enqueue_scripts()
    {
        if ( ! is_admin() ) {
            require_once('includes/enqueue-scripts.php');
        }
    }
endif;

if ( ! function_exists( 'convertro_setup' ) ) :
    function convertro_setup()
    {
    	add_theme_support( 'post-thumbnails' );
        add_image_size( 'team-member-thumb', 60, 73 );
        add_image_size( 'video-large', 400, 240, true );
        add_image_size( 'video-normal', 200, 120, true );

        require_once('includes/menus.php');
    }
endif;

function on_init(){
	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
        require_once 'includes/Custom-Metaboxes/init.php';
    }
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', false, '2');
        wp_enqueue_script('jquery');
    }
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/javascripts/vendor/bootstrap.3.0.3.js", array( 'jquery' ) );
    wp_enqueue_script('backbone', get_template_directory_uri() . "/javascripts/vendor/backbone.js");
    wp_enqueue_script('fetch-form', get_template_directory_uri() . "/javascripts/fetch-form.js", array( 'jquery','backbone' ) );

    // code to declare the URL to the file handling the AJAX request <p></p>
    wp_localize_script( 'fetch-form', 'CVO', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action("wp_ajax_get_request_form_template", "get_request_form_template");
add_action("wp_ajax_nopriv_get_request_form_template", "get_request_form_template");

function get_request_form_template() {
    $response = Array();
    ob_start();
    include(locate_template('template-parts/ajax/tpl-request-form.php'));
    $response['content'] = ob_get_clean();
    $response['status'] = 100;
    echo json_encode($response);
    die();
}

add_action("wp_ajax_submit_request_form_template", "submit_request_form_template");
add_action("wp_ajax_nopriv_submit_request_form_template", "submit_request_form_template");

function submit_request_form_template() {
    include(locate_template('template-parts/ajax/tpl-proccess-request-form.php'));


    $response = submitForm();
    if ($response['status'] == 'success') {
        $id = isset($_POST['dataContext']) ? $_POST['dataContext'] : null;
        if (is_numeric($id) && !in_array($id, $_SESSION['data-sheets'])) {
            array_push($_SESSION['data-sheets'], $id);
        }
    }

    echo json_encode($response);
    die();
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

function get_ID_by_slug($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

function limit_words($string, $word_limit)
{
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

function get_pagination($queryObject, $format)
{
    $paging = paginate_links( array(
        'base' => str_replace( 90, '%#%', esc_url( get_pagenum_link( 90 ) ) ),
        'format' => '?'.$format.'=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $queryObject->max_num_pages
    ) );
    return $paging;
}

function get_pagination_html($queryObject, $format)
{
    ?>
    <div class="section-read-more">
        <div class="container">
            <div class="pagination center-block">
            <?php echo get_pagination($queryObject, $format); ?>
            </div>
        </div>
    </div>
    <?php
}

function get_page_number()
{
    return (get_query_var('paged')) ? get_query_var('paged') : 1;
}


function get_sticky_posts($postsPerPage)
{
    $sticky = get_option( 'sticky_posts' );
    $q = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'post__in' => $sticky
    ));
    return $q;
}

function get_all_posts($postsPerPage)
{
    $sticky = get_option( 'sticky_posts' );
    $q = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $postsPerPage,
        'post__not_in' => $sticky
    ));
    return $q;
}

function get_demo_link($className, $link, $text, $args = null)
{
    if ($args)
    {
        $args['icon'] = isset($args['icon']) && !empty($args['icon']) ? $args['icon'] : false;
        $args['isFlipped'] = isset($args['isFlipped']) && !empty($args['isFlipped']) ? $args['isFlipped'] : false;
        $args['target'] = isset($args['target']) && !empty($args['target']) ? ' target="_blank" ' : '';
        $args['data-context'] = isset($args['data-context']) && !empty($args['data-context']) ? ' data-context="'.$args['data-context'].'" ' : '';
    }

    $buff = '<a class="demo-link ' . $className . '" href="' . $link . '"' . $args['target'] . ' '.$args['data-context'].'>';
        if ($args['icon']) {
            $buff .= '<i class="'.$args['icon'].'"></i>';
        }

        if (!$args['isFlipped']) {
            $buff .= '<svg class="tip" height="26" width="14">';
            $buff .= '<polygon points="0,27 0,27 0,0 0,0 10,13"/></svg>';
            $buff .= $text;

        } else {
            $buff .= '<svg class="tip flipped" height="26" width="14">';
            $buff .= '<polygon points="0,13 13,27 13,0"/></svg>';
            $buff .= $text;
        }
    $buff .= '</a>';
    return $buff;
}

function tags_object_to_tags_ids($tags = null)
{
    if (!$tags) {
        return null;
    }
    $ids = array();

    foreach($tags as $tag) {
        array_push($ids, $tag->term_id);
    }
    return $ids;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function set_widgets_init()
{

    register_sidebar( array(
        'name' => 'Blog sidebar',
        'id' => 'blog_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Blog Post sidebar',
        'id' => 'blog__post_sidebar',
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


function tag_cloud_highlight($cloud)
{


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


add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page(){
    add_menu_page( '
        Convertro theme settings', 'Convertro', 'manage_options', 'convertro_settings', 'my_custom_menu_page', get_template_directory_uri().'/images/owl.png' , 6 );
}

function my_custom_menu_page() {

}

function breadcrumbs ($args) {
    $args['theme'] = isset($args['theme']) ? $args['theme'] : 'theme_bg_lighter';
    ?>
        <div class="breadcrumbs <?php echo $args['theme']; ?>">
            <div class="container">
                <h2 class="title col-md-12">
                    <?php foreach($args['trail'] as $item): ?>
                        <a class="link" href="<?php echo $item['url'];?>"><?php echo $item['title'] ?></a>
                        <span class="seperator">&raquo;</span>
                    <?php endforeach;?>
                    <?php echo $args['child']; ?>
                </h2>
            </div>
        </div>
    <?php
}


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
require_once('includes/Post-Types/white_papers-post-type.php');
require_once('includes/Post-Types/difference-post-type.php');
require_once('includes/Post-Types/faq-post-type.php');
require_once('includes/Post-Types/data_sheets-post-type.php');


require_once('includes/Templates-Definitions/tpl-def-case-studies.php');
require_once('includes/Templates-Definitions/tpl-def-white-papers.php');
require_once('includes/Templates-Definitions/tpl-def-news.php');
require_once('includes/Templates-Definitions/tpl-def-faq.php');
require_once('includes/Templates-Definitions/tpl-def-about.php');
require_once('includes/Templates-Definitions/tpl-def-home.php');
require_once('includes/Templates-Definitions/tpl-def-resources.php');
require_once('includes/Templates-Definitions/tpl-def-data-sheets.php');
require_once('includes/Templates-Definitions/tpl-def-careers.php');






