<div id="blog-posts" class="theme_bg_light section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('Latest Blog Posts'); ?></h2>
			<div class="col-md-3 text-right"></div>
		</div>
	</div>
	<div class="container">

		<?php $q = get_all_posts(3); ?>

		<div class="row padd-row">
			<ul class="blog-posts-list">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
					<li class="item col-md-4 hover-yellow">
						<h2 class="title ellipsis">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</h2>
						<?php echo limit_words(get_the_excerpt(), 25); ?>
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
				<?php echo get_demo_link('yellow', site_url('/resources/blog') ,  __('See all blog posts')); ?>
			</div>
		</div>
	</div>
</div>