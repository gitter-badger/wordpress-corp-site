<?php

define('VIDEOS_ITEMS_PER_ROW', 4);

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

function get_pagination($queryObject)
{
    $paging = paginate_links( array(
        'base' => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
        'format' => '?paged=%#%',
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
        $args['data-item-id'] = isset($args['data-item-id']) && !empty($args['data-item-id']) ? ' data-item-id="'.$args['data-item-id'].'" ' : '';

    }

    $buff = '<a class="demo-link ' . $className . '" href="' . $link . '"' . $args['target'] . ' '.$args['data-context']. ' '.$args['data-item-id'].'>';
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

function breadcrumbs ($args, $title = '') {
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

function getBreadcrumns($args, $title = '') {
    $args['theme'] = isset($args['theme']) ? $args['theme'] : 'theme_bg_dark';
    $buff = '<div class="breadcrumbs '.$args['theme'].'">';
        $buff .= '<div class="container">';
            $buff .= '<h2 class="title col-md-12">';
                $buff .= '<a class="link" href="'.site_url('/').'">'.__('Home').'</a>';
                $buff .= '<span class="seperator"> &raquo; </span>';
                foreach($args['trail'] as $item) {
                    $buff .= '<a class="link" href="'.$item[0].'">'.$item[1].'</a>';
                    $buff .= '<span class="seperator"> &raquo; </span>';
                }
                $buff .= getShortName($args['child']);
            $buff .= '</h2>';
        $buff .= '</div>';
    $buff .= '</div>';
    return $buff;
}

function getShortName($str) {

    if (strlen($str) > 20) {
        return substr($str, 0,20) . '...';
    }
    return $str;
}

/**
 * Create Admin Menu Separator
 **/
function add_admin_menu_separator($position) {

    global $menu;
    $index = 0;

    foreach($menu as $offset => $section) {
        if (substr($section[2],0,9)=='separator')
            $index++;
        if ($offset>=$position) {
            $menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
            break;
        }
    }

    ksort( $menu );
}

function getPostByParentTerm($parentTermSlug, $isDivided = true)
{
    global $globalPostId;
    $container = array();
    $term_parent = get_term_by( 'slug',$parentTermSlug , 'devision');
    $terms = get_terms('devision', array('child_of' => $term_parent->term_id));
    $html = '<ul class="col-md-6 rainbow-list">';
    foreach($terms as $custom_taxonomy) {
        $term_parent = get_term_by( 'id',$custom_taxonomy->parent , 'devision');
        if ($isDivided) {
            $q = new WP_Query(array(
                'post_type' => 'team_member',
                'posts_per_page' => '300',
                'meta_key' => '_cmb_member_group',
                'meta_value' => 'member',
                'taxonomy' => 'devision',
                'include_children' => false,
                'orderby' => 'slug',
                'term' => $custom_taxonomy->slug,
                'nopaging' => true,
            ));
            $colSize = 4;
        } else {
            $q = new WP_Query(array(
                'post_type' => 'team_member',
                'posts_per_page' => '300',
                'taxonomy' => 'devision',
                'include_children' => false,
                'term' => $custom_taxonomy->slug,
                'orderby' => 'slug',
                'nopaging' => true,
            ));
            $colSize = 4;
        }

        if ( $q->have_posts() ) {
            $html .= '<li class="col-md-12 team-devision">';
            $html .= '<h2 class="title">' . $custom_taxonomy->name .'</h2>';
            while ( $q->have_posts() ) {
                $q->the_post();
                $postId = $q->post->ID ;

                $memberName = get_post_meta( $postId, '_cmb_member_name', true );
                $memberTitle = get_post_meta( $postId, '_cmb_member_title', true );
                $memberPhoto = get_post_meta( $postId, '_cmb_member_photo', true );
                $memberDesc = get_post_meta( $postId, '_cmb_member_job_description', true );
                $selectedClass = $globalPostId == $postId ? 'selected' : '';
                    $html .= '<div class="col-xs-'.$colSize.' member-item">';
                        $html .= '<a href="'.get_permalink().'" class="member-photo grayscalize ' . $selectedClass . '">';
                            $html .= '<img src="'.$memberPhoto.'"/>';
                        $html .= '</a>';
                        $html .= '<div class="member-name ellipsis">'.$memberName.'</div>';
                        $html .= '<div class="member-position ellipsis">'.$memberTitle.'</div>';
                    $html .= '</div>';
            }
            $html .= '</li>';
        }



    }
    $html .= '</ul>';
    return $html;
}

function get_the_content_with_formatting ($content = '', $stripteaser = 0, $more_file = '') {
    $content = apply_filters('the_content', $content);
    $content = preg_replace('/<span id\=\"(more\-\d+)"><\/span>/', '<!--more-->', $content);
    $content = explode('<!--more-->', $content);
    return $content[0];
}

function getPageBySlug($slug) {
    $allPages = get_pages();
    foreach($allPages as $singlePage) {
        if ($singlePage->post_name === $slug) {
            return $singlePage;
            break;
        }
    }
    return null;
}

function startsWith($haystack, $needle) {
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function endsWith($haystack, $needle) {
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function wpQuery($type = 'post', $limit = -1, $pageNumber = false, $exclude = false) {
    $args = [];
    $args['post_type'] = $type;
    $args['posts_per_page'] = $limit;
    if ($pageNumber) {
        $args['paged'] = $pageNumber;
    }
    if ($exclude) {
        $args['post__not_in'] = $exclude;
    }
    return new WP_Query($args);
}

function wpMeta($id, $meta) {
    $prefix = '_cmb_';
    return get_post_meta($id, $prefix.$meta, true );
}

function getSectionTitle($str) {
    return '<div class="section-title">
        <div class="container">
            <h2 class="title col-md-9">'.$str.'</h2>
            <div class="col-md-3 text-right"></div>
        </div>
    </div>';
}

function getSectionFooter($str) {
    return '<div class="section-read-more">
        <div class="container">
            <h2 class="title col-md-9"></h2>
            <div class="col-md-3 text-right">'.$str.'</div>
        </div>
    </div>';
}


