<div id="customers" class="theme_bg_dark section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12"><?php _e('Notable Customers'); ?></h2>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'client',
				'posts_per_page' => '100',
			));
		?>
		<div class="row padd-row">
			<ul class="customers-list">
			<?php if ( $q->have_posts() ) : $index = 1; ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
				<?php
					$isNewLine = ($index % 5 == 0) ? true: false;
					$defaultLogo = get_post_meta( $post->ID, '_cmb_client_logo_bw', true );
					$colorLogo = get_post_meta( $post->ID, '_cmb_client_logo_color', true );
					$caseStudyURL = get_post_meta( $post->ID, '_cmb_case_study_url', true );
					$readMoreClass = get_post_meta( $post->ID, '_cmb_read_more_color', true );
				?>
				<?php if ($isNewLine): ?>
					<li class="seperator"></li>
				<?php endif;?>
					<li class="item col-md-3">
						<div class="customer-logo display-cell">
							<img src="<?php echo $defaultLogo; ?>"/></div>
							<?php if(!empty($caseStudyURL)): ?>
								<?php echo get_demo_link($readMoreClass, $caseStudyURL,  __('Read Case Study')); ?>
							<?php endif; ?>
					</li>
				<?php $index += 1; endwhile; ?>
			<?php endif; ?>
			</ul>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</div>