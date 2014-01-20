<?php get_header(); ?>

	<?php
		$postsPerPage = 2;
		$q = new WP_Query(array(
			'post_type' => 'video',
			'posts_per_page' => $postsPerPage,
			'meta_key' => '_cmb_is_featured',
			'meta_value' => 'on',
			'meta_query' => array(array('key' => '_thumbnail_id'))
		));
	?>
	<div class="featured-videos header-area">
		<div class="padd-row theme_bg_darker">
			<div class="container">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); ?>
						<div class="video-item col-md-6">
						<a href="<?php echo get_permalink();?>">
							<?php if(has_post_thumbnail( $post->ID )): ?>
								<div class="video-thumbnail"><?php the_post_thumbnail('video-large');?>
								<span class="play-icon"></span></div>
							<?php else:?>
								<div class="video-no-thumbnail">
									<span class="play-icon"></span>
								</div>
							<?php endif;?>
						</a>
						<h5 class="the-time dimmed">uploaded on: <?php the_time('M d, Y');?></h5>
						<h4 class="title ellipsis"><?php the_title(); ?></h4>
						<div><?php echo get_demo_link('orange', get_permalink(), __('View Video')); ?></div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'video'; ?>
			<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
		</div>
	</div>
	<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
				array('url' => site_url('/resources'), 'title' => __('Resources'))
			),
			'child' => __('Videos')
		));
	?>

	<?php
		$postsPerPage = 12;
		$postsPerRow = 4;
		$q = new WP_Query(array(
			'post_type' => 'video',
			'posts_per_page' => $postsPerPage,
			'paged'=> get_page_number(),
			'ignore_sticky_posts'=> '1',
		));
	?>

	<div class="more-videos">

		<?php if ( $q->have_posts() ) : ?>
			<?php $index = 0; while ( $q->have_posts() ) : $q->the_post(); ?>

			<?php if ($index % $postsPerRow == 0 && $index != 0 ): ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($index % $postsPerRow == 0 || $index == 0): ?>
				<div class="padd-row">
					<div class="container">
			<?php endif; ?>

					<div class="video-item col-md-3">
						<a href="<?php echo get_permalink();?>">
							<?php if(has_post_thumbnail( $post->ID )): ?>
								<div class="video-thumbnail"><?php the_post_thumbnail('video-normal');?>
								<span class="play-icon"></span></div>
							<?php else:?>
								<div class="video-no-thumbnail">
									<span class="play-icon"></span>
								</div>
							<?php endif;?>
						</a>
						<h5 class="the-time dimmed">uploaded on: <?php the_time('M d, Y');?></h5>
						<h4 class="subtitle"><?php the_title(); ?></h4>
						<div><?php echo get_demo_link('orange', get_permalink(), __('View Video')); ?></div>
					</div>
			<?php $index += 1; endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="">
		<div class="pagination center-block">
				<?php echo get_pagination($q, 'video'); ?>
		</div><!-- #post-navigation -->
	</div>
<?php get_footer(); ?>