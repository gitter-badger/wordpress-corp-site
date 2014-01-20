<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="blog-posts">
	<?php $q = get_sticky_posts(2); ?>


	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'blog'; ?>
			<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
		</div>
	</div>

	<div class="row theme_bg_lighter section">
		<div class="section-title">
			<div class="container">
				<h2 class="title col-md-12"><?php _e("Search results for '".get_search_query()."'"); ?></h2>
			</div>
		</div>

		<div class="container">

			<div class="row padd-row posts">

				<div class="col-md-9">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
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
	</div>
</div><!--end content-->

<?php get_footer(); ?>
