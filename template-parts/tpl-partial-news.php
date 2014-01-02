<div id="news" class="row theme_bg_darker section">
	<div class="container">
		<div class="section-title row">
			<h2 class="title col-md-9"><?php _e('News'); ?></h2>
			<div class="col-md-3 text-right">
				<a class="demo-link pink" href="<?php echo get_post_type_archive_link('news'); ?>">
					<?php _e("News Archive"); ?>
					<svg class="tip" height="26" width="14">
		        		<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/>
		    		</svg>
				</a>
			</div>
		</div>
		<?php
			$q = new WP_Query(array(
				'post_type' => 'news',
				'posts_per_page' => '3',
			));
		?>
		<ul class="news-list">
		<?php if ( $q->have_posts() ) : ?>
			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php $cssClass = get_post_meta( $post->ID, '_cmb_read_more_color', true ); ?>
				<li class="item col-md-4">
					<div class="">
						<a class="title <?php echo $cssClass; ?>" href="<?php the_permalink();?>"><?php the_title(); ?></a>
						<?php the_excerpt();?>
					</div>
				</li>
			<?php endwhile; ?>
		<?php endif; ?>
		</ul>
		<?php wp_reset_postdata(); ?>
	</div>
</div>