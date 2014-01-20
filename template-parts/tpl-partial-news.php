<div id="news" class="theme_bg_darker section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('Latest News'); ?></h2>
			<div class="col-md-3 text-right">
			</div>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'news',
				'posts_per_page' => '3',
			));
		?>
		<div class="row padd-row">
			<ul class="news-list rainbow-list">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
					<li class="item col-md-4">
						<div class="">
							<h4 class="ellipsis title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>

							<?php the_excerpt();?>
						</div>
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
				<?php echo get_demo_link('pink', site_url('/resources/news') ,  __('News Archive')); ?>

			</div>
		</div>
	</div>
</div>