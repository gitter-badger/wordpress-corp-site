<div id="case-studies" class="row theme_bg_light section case-studies-resources">
	<div class="container">
		<div class="section-title row">
			<h2 class="title col-md-9"><?php _e('Case Studies'); ?></h2>
			<div class="col-md-3 text-right">
				<?php echo get_demo_link('yellow', get_post_type_archive_link('case_study'),  __('See all case studies')); ?>
			</div>
		</div>
		<?php
			$q = new WP_Query(array(
				'post_type' => 'case_study',
				'posts_per_page' => '3',
			));
		?>
		<ul class="case-studies-list">
		<?php if ( $q->have_posts() ) : ?>
			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php $icon = get_post_meta( $post->ID, '_cmb_icon', true ); ?>
				<li class="item col-md-4">
					<div class="logo"><img src="<?php echo $icon?>"></div>
					<h2 class="title">
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h2>
					<?php the_excerpt();?>
				</li>
			<?php endwhile; ?>
		<?php endif; ?>
		</ul>
		<?php wp_reset_postdata(); ?>
	</div>
</div>