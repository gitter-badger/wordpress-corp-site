<div id="white-papers" class="theme_bg_white section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('Latest White Papers'); ?></h2>
			<div class="col-md-3 text-right"></div>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'white_paper',
				'posts_per_page' => '3',
			));

		?>
		<div class="row padd-row">
			<ul class="white-papers-list">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
				<?php $cssClass = get_post_meta( $post->ID, '_cmb_read_more_color', true ); ?>
					<li class="item col-md-4 hover-<?php echo $cssClass; ?>">
						<div class="">
							<div class="">
								<a class="icon bg-<?php echo $cssClass; ?>" href="<?php the_permalink();?>"></a>
							</div>
							<h2 class="title"><?php the_title(); ?></h2>
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
				<?php echo get_demo_link('orange', site_url('/resources/white-paper'), __('See all white papers')); ?>

			</div>
		</div>
	</div>
</div>