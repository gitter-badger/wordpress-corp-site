<?php $q = new WP_Query(array('post_type' => 'partner', 'posts_per_page' => '100')); ?>
<div id="partners" class="theme_bg_light section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12">{{ _e('Notable Partners') }}</h2>
		</div>
	</div>
	<div class="container">
		<div class="row padd-row">
			<ul class="partners-list">
			@if ( $q->have_posts() )
			<?php $index = 1; ?>
				@while ( $q->have_posts() )
				<?php $q->the_post(); $postId = $post->ID; ?>
				<?php
					$isNewLine = ($index % 5 == 0) ? true: false;
					$colorLogo = get_post_meta( $post->ID, '_cmb_partner_logo_color', true );
				?>
					<li class="item col-md-3">
						<div class="parnter-logo display-cell">
							<img src="{{ $colorLogo }}"/></div>
					</li>
				<?php $index += 1; endwhile; ?>
			@endif
			</ul>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>