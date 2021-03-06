<?php
/*
Template Name: Blog
*/
get_header(); ?>
<?
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else { $paged = 1; }
?>
<div class="blog-posts">
	<?php
	    $q = new WP_Query(array(
	        'post_type' => 'blog_posts',
	        'posts_per_page' => 2,
	        'orderby' => 'rand',
	        'meta_key' => '_cmb_is_featured',
			'meta_value' => 'on',
	    ));
    ?>
	<div class="featured-blog-posts header-area">
		<div class="row padd-row theme_bg_darker">
			<div class="container">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); ?>
						<div class="blog-post-item col-md-6">
							<a class="blog-post-image" href="<?php echo get_permalink();?>">
								<?php if(has_post_thumbnail( $post->ID )): ?>
									<div class="blog-post-thumbnail"><?php the_post_thumbnail('video-large');?>
									</div>
								<?php else:?>
									<div class="blog-post-no-thumbnail">
									</div>
								<?php endif;?>
							</a>

							<h4 class="title ellipsis"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
							<h5 class="the-time dimmed">updated on: <?php the_time('M d, Y');?></h5>
							<div>
								<?php echo get_demo_link('pink', get_permalink(), __('View')); ?>

							</div>
						</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'blog'; ?>
			@include('views.common.resourcesNavigation')
		</div>
	</div>


<?php
$cat = get_category( get_query_var( "cat" ) );
breadcrumbs(array(
	'theme' => 'theme_bg_dark',
	'trail' => array(
		array('url' => site_url('/'), 'title' => __('Home')),
		array('url' => site_url('/blog'), 'title' => __('Blog')),
	),
	'child' => $cat->name
));
?>

<?php
		$sticky = get_option( 'sticky_posts' );
		$postsPerPage = 5;
	    $q = new WP_Query(array(
	        'post_type' => 'blog_posts',
	        'posts_per_page' => $postsPerPage,
	        'post__not_in' => $sticky,
	        'paged'=>$paged,
	        'category__in' => $cat->term_id
	    ));
	    ?>
	<div class="row theme_bg_lighter section">
		<div class="section-title">
			<div class="container">
				<h2 class="title col-md-12"><?php echo $cat->name . ' '. __('Posts');?></h2>
			</div>
		</div>
		<div class="container">
			<div class="row padd-row posts">
				<div class="col-md-9">
					<?php if ( $q->have_posts() ) : ?>
						<?php while ( $q->have_posts() ) : $q->the_post(); ?>
							<li class="row">
								<div class="col-md-4 padd-row">
									<?php if(has_post_thumbnail( $post->ID )): ?>
										<div class="blog-post-thumbnail"><?php the_post_thumbnail('video-normal');?>
										</div>
									<?php else:?>
										<div class="blog-post-no-thumbnail">
										</div>
									<?php endif;?>
								</div>
								<div class="col-md-8 padd-row post-list-item">
									<h3 class="post-title title">
									  <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
									</h3>
									<p class="dimmed"><?php _e('posted on') ?> <?php the_time( __( 'F jS, Y', 'convertro' ) ); ?></p>
									<p class="categories"><span><?php _e('Categories:');?></span> <?php the_category(', '); ?></p>
									<div class="entry">
										<?php echo limit_words(get_the_excerpt(), '25'); ?> ...
									</div><!--end entry-->
									<div class="read-more-link">
										<?php echo get_demo_link('yellow', get_permalink(), __('Read more')); ?>

									</div>
								</div>
							</li>
							<li class="seperator-horizontal"></li>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
					<div class="col-md-3 sidebar">
						<?php
						if ( ! dynamic_sidebar( 'Blog sidebar' ) ) {
						}?>
					</div>
				</div>
			</div>
		</div>
		<?php echo get_pagination_html($q, 'post'); ?>
	</div>
</div><!--end content-->

<?php get_footer(); ?>