<div id="featured-videos" class="theme_bg_white section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('Latest Videos'); ?></h2>
			<div class="col-md-3 text-right"></div>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'video',
				'posts_per_page' => '3',
			));
		?>
		<div class="row padd-row">
			<ul class="videos-list rainbow-list">
			<?php if ( $q->have_posts() ) : ?>
					<?php while ( $q->have_posts() ) : $q->the_post(); ?>
						<li class="video-item col-md-4">

							<a href="<?php echo get_permalink();?>">
								<h4 class="title ellipsis"><?php the_title(); ?></h4>
								<?php if(has_post_thumbnail( $post->ID )): ?>
									<div class="video-thumbnail"><?php the_post_thumbnail('video-large');?>
									<span class="play-icon"></span></div>
								<?php else:?>
									<div class="video-no-thumbnail">
										<span class="play-icon"></span>
									</div>
								<?php endif;?>
							</a>
						</li>

					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
	<div class="section-read-more">
		<div class="container">
			<h2 class="title col-md-9"></h2>
			<div class="col-md-3 text-right">
				<?php echo get_demo_link('pink', get_post_type_archive_link('video'),  __('Watch all videos')); ?>

			</div>
		</div>
	</div>
</div>
