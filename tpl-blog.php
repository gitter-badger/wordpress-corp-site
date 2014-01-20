<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="blog-posts">
	<?php $q = get_sticky_posts(2); ?>
	<div class="featured-blog-posts header-area">
		<div class="padd-row theme_bg_darker">
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

							<h4 class="title ellipsis"><?php the_title(); ?></h4>
							<h5 class="the-time dimmed">updated on: <?php the_time('M d, Y');?></h5>
							<div>
								<?php echo get_demo_link('pink', get_permalink(), __('Read Post')); ?>

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
			<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
		</div>
	</div>

	<?php
		$sticky = get_option( 'sticky_posts' );
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 5;
	    $q = new WP_Query(array(
	        'post_type' => 'post',
	        'posts_per_page' => $postsPerPage,
	        'post__not_in' => $sticky,
	        'paged'=>$paged
	    ));
	    ?>
	<?php
	breadcrumbs(array(
		'theme' => 'theme_bg_dark',
		'trail' => array(
			array('url' => site_url('/'), 'title' => __('Home'))
		),
		'child' => __('Blog')
	));
	?>
	<div class="theme_bg_lighter">
		<div class="container">
			<div class="padd-row posts">
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
									  <?php the_title(); ?>
									</h3>
									<p class="dimmed"><?php _e('posted on') ?> <?php the_time( __( 'F jS, Y', 'convertro' ) ); ?></p>
									<p class="categories"><?php the_category(' '); ?></p>
									<div class="entry">
										<?php echo limit_words(get_the_excerpt(), '25'); ?> ...
									</div><!--end entry-->
									<div class="read-more-link">
										<?php echo get_demo_link('yellow', get_permalink(), __('Read Post')); ?>

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