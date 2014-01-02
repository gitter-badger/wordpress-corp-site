<div id="partners" class="row theme_bg_light section">
	<div class="container">
		<h2 class="title col-md-12"><?php _e('Our Partners'); ?></h2>
		<?php
			$q = new WP_Query(array(
				'post_type' => 'partner',
				'posts_per_page' => '100',
			));
		?>
		<ul class="partners-list">
		<?php if ( $q->have_posts() ) : $index = 1; ?>
			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php
				$isNewLine = ($index % 5 == 0) ? true: false;
				$colorLogo = get_post_meta( $post->ID, '_cmb_partner_logo_color', true );
			?>
			<?php if ($isNewLine): ?>
				<li class="seperator"></li>
			<?php endif;?>
				<li class="item col-md-3">
					<div class="parnter-logo display-cell">
						<img src="<?php echo $colorLogo; ?>"/></div>
				</li>
			<?php $index += 1; endwhile; ?>
		<?php endif; ?>
		</ul>
		<?php wp_reset_postdata(); ?>
	</div>
</div>