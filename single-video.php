<?php
get_header();
?>
<div id="single-video-page">
	<div id="content" class="">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $globalPostId = $post->ID; ?>

					<div class="single-video-intro theme_bg_darker">
						<div class="container">
							<div class="row">

								<div class="col-md-7">
									<div>
										<?php
											$text = get_post_meta( $post->ID, '_cmb_hp_video_embed', true );

											?>
											<div class="single-video-content">
												<?php
													if ($text) {
														echo  wp_oembed_get($text, array('width' => '460'));
													}
												?>
											</div>
									</div>
								</div>
								<div class="col-md-5">
									<h2 class="title"><?php the_title();?></h2>
									<h5 class="the-time">uploaded on: <?php the_time('M d, Y');?></h5>
									<div class="desc"><?php the_content(); ?></div>
								</div>
							</div>
						</div>
					</div>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'video'; ?>
			<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
		</div>
	</div>

		<?php
			$postsPerPage = 6;
			$postsPerRow = 3;
			$q = new WP_Query(array(
				'post_type' => 'video',
				'posts_per_page' => $postsPerPage,
				'paged'=> get_page_number(),
				'ignore_sticky_posts'=> '1',
				'post__not_in'=> array($globalPostId)
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
					<div class="video-item col-md-4">

						<a href="<?php echo get_permalink();?>">
							<?php if(has_post_thumbnail( $post->ID )): ?>
								<div class="video-thumbnail"><?php the_post_thumbnail('video-normal');?>
									<span class="play-icon"></span>
								</div>
							<?php else:?>
								<div class="video-no-thumbnail">
									<span class="play-icon"></span>
								</div>
							<?php endif;?>
						</a>
						<h5 class="the-time dimmed">uploaded on: <?php the_time('M d, Y');?></h5>
						<h4 class="subtitle"><?php the_title(); ?></h4>
						<div><?php echo get_demo_link('orange', get_permalink(), __('View')); ?></div>

					</div>
			<?php $index += 1; endwhile; ?>
		<?php endif; ?>
			</div>
		</div>
	</div>
	<?php echo get_pagination_html($q, 'video'); ?>




</div>
<?php get_footer(); ?>