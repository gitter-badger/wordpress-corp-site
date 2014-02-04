<?php
session_start();


if (!isset($_SESSION['white-papers'])) {
    $_SESSION['white-papers'] = array();
}

if (!isset($_SESSION['request-demos'])) {
    $_SESSION['request-demos'] = array();
}

$COLOR_CLASSES = array('pink', 'orange', 'yellow', 'teal');

require_once 'includes/Helpers/common.php';

add_action('init', function () {
    if ( ! class_exists( 'cmb_Meta_Box' ) ) {
        require_once 'includes/Custom-Metaboxes/init.php';
    }
});

add_action("after_switch_theme", function () {
   global $wpdb;

   $table_name = $wpdb->prefix . "cvo_contacts";
   $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      name tinytext NOT NULL,
      email VARCHAR(255) NOT NULL,
      context VARCHAR(255) DEFAULT '' NOT NULL,
      company VARCHAR(255) DEFAULT '' NOT NULL,
      item_id VARCHAR(255) NULL,
      title VARCHAR(255) NULL,
      phone VARCHAR(255) NULL,
      position VARCHAR(255) NULL,
      industry VARCHAR(255) NULL,
      UNIQUE KEY id (id)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}, 10 ,  2);


add_action( 'wp_enqueue_scripts', function () {
    if ( ! is_admin() ) {
        require_once('includes/enqueue-scripts.php');
    }
});


add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'team-member-thumb', 60, 73 );
    add_image_size( 'video-large', 400, 240, true );
    add_image_size( 'video-normal', 200, 120, true );

    require_once('includes/menus.php');
});


/**
 * Register our sidebars and widgetized areas.
 *
 */
add_action( 'widgets_init', function () {

    require_once('includes/sidebars.php');
});


add_filter('wp_tag_cloud', function($cloud) {
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
});

add_action( 'admin_menu', function () {
    add_menu_page('Convertro settings', 'Convertro', 'manage_options', 'convertro_settings_page', 'set_settings_page', get_template_directory_uri().'/images/owl.png' , 3 );
    add_submenu_page( 'convertro_settings_page', 'Documentation', 'Documentation', 'manage_options', 'documentation-page', 'set_documentation_page' );
    add_admin_menu_separator(19);
});

function set_settings_page() {
    require_once('includes/Admin/settings.php');
}

function set_documentation_page() {
    require_once('includes/Admin/documentation.php');
}


add_action('wp_dashboard_setup', function () {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Recent Requests (white papers)', 'custom_dashboard_help');
});


function custom_dashboard_help() {
    global $wpdb;
    $requests = $wpdb->get_results( "SELECT * FROM ". $wpdb->prefix ."cvo_contacts ORDER BY time DESC LIMIT 3" );
    ?>
            <div>
                <a href="<?php get_template_directory_uri();?>index.php"><?php _e('See all'); ?></a>
            </div>
            <ul class="lastest-requests">
                <?php foreach($requests as $request): ?>
                <?php $date = new DateTime($request->time); ?>
                <?php $cssStyle = ($request->context === 'request-demo')? 'pink': 'teal'; ?>
                <li>
                    <div class="date"><?php echo $date->format('D, M jS, H:i');?></div>

                    <div class="personal-info">
                        <?php echo '<strong>' . $request->name . '</strong> ' . __('from'). ' <strong>' . $request->company .'</strong>' . __(' Requests for a '). '<span class="title '.$cssStyle.'"> '.$request->context.'</span>'; ?>
                    </div>
                    <table>
                        <?php if (!empty($request->title)):?>
                        <tr><td class="itemId"><strong><?php echo __('Item')?> </strong></td><td><?php echo $request->title;?></td></tr>
                        <?php endif;?>
                        <tr><td class="position"><strong><?php echo __('Position')?> </strong></td><td><?php echo $request->position;?></td></tr>
                        <tr><td class="email"><strong><?php echo __('Email')?> </strong></td><td><?php echo $request->email;?></td></tr>
                        <tr><td class="phone"><strong><?php echo __('Phone')?> </strong></td><td><?php echo $request->phone;?></td>
                        </tr>
                    </table>
                </li>
            <?php endforeach; ?>
            </ul>
    <?php
}

add_action('admin_head', function () {
    require_once('includes/Admin/Css/styles.php');
});



add_action("wp_ajax_nopriv_get_request_form_template", "get_request_form_template");
add_action("wp_ajax_get_request_form_template", "get_request_form_template");
function get_request_form_template() {
    $response = Array();
    ob_start();
    include(locate_template('views/backend/ajax/request-form.php'));
    $response['content'] = ob_get_clean();
    $response['status'] = 100;
    echo json_encode($response);
    die();
}

add_action("wp_ajax_submit_request_form_template", "submit_request_form_template");
add_action("wp_ajax_nopriv_submit_request_form_template", "submit_request_form_template");
function submit_request_form_template() {
    include(locate_template('includes/Ajax/proccess-request-form.php'));
    $response = submitForm();
    if ($response['status'] == 'success') {
        $context = isset($_POST['context']) ? $_POST['context'] : null;
        $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : null;
        if ($context === 'white-paper' && is_numeric($itemId) && !in_array($itemId, $_SESSION['white-papers'])) {
            array_push($_SESSION['white-papers'], $itemId);
        }
        if ($context === 'request-demo' && !in_array($itemId, $_SESSION['request-demos'])) {
            array_push($_SESSION['request-demos'], $itemId);
        }
    }

    echo json_encode($response);
    die();
}
$position = array(
    'carrer' => 5,
    'team' => 5,
    'client' => 5,
    'partner' => 5,
    'case_study' => 5,
    'strength' => 5,
    'video' => 5,
    'news' => 5,
    'white_paper' => 5,
    'difference' => 5,
    'faq' => 5,
);



require_once('includes/shortcodes.php');
require_once('includes/Post-Types/custom-post-type.php');
require_once('includes/Post-Types/team-post-type.php');
require_once('includes/Post-Types/blog-posts-post-type.php');
require_once('includes/Post-Types/clients-post-type.php');
require_once('includes/Post-Types/partners-post-type.php');
require_once('includes/Post-Types/career-post-type.php');
require_once('includes/Post-Types/case-studies-post-type.php');
require_once('includes/Post-Types/strengths-post-type.php');
require_once('includes/Post-Types/videos-post-type.php');
require_once('includes/Post-Types/news-post-type.php');
require_once('includes/Post-Types/white_papers-post-type.php');
require_once('includes/Post-Types/faq-post-type.php');

require_once('includes/Templates-Definitions/tpl-def-case-studies.php');
require_once('includes/Templates-Definitions/tpl-def-white-papers.php');
require_once('includes/Templates-Definitions/tpl-def-news.php');
require_once('includes/Templates-Definitions/tpl-def-faq.php');
require_once('includes/Templates-Definitions/tpl-def-about.php');
require_once('includes/Templates-Definitions/tpl-def-home.php');
require_once('includes/Templates-Definitions/tpl-def-resources.php');
require_once('includes/Templates-Definitions/tpl-def-careers.php');
require_once('includes/Templates-Definitions/tpl-def-differences.php');




