<div id="faq" class="theme_bg_dark section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('Latest Faq'); ?></h2>
			<div class="col-md-3 text-right"></div>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'faq',
				'posts_per_page' => '3',
			));
		?>
		<div class="row padd-row">
			<ul class="faq-list rainbow-list">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
				<?php $cssClass = get_post_meta( $post->ID, '_cmb_read_more_color', true ); ?>
					<li class="item col-md-4">
						<h4 class="title ellipsis question toggler <?php echo $cssClasses[$cssClassIndex];?>"><?php the_title(); ?></h4>
						<div class="answer">
							<span class="question-icon-small bg">?</span>
							<?php echo limit_words(get_the_excerpt(), 25); ?>
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
				<?php echo get_demo_link('pink', site_url('/resources/faq'),  __('Read all questions')); ?>

			</div>
		</div>
	</div>
</div>