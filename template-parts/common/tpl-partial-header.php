<div class="header-area">
	<div class="theme_bg_darker">
		<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$mainImageUrl = get_post_meta( $post->ID, '_cmb_main_image', true );
					$mainImageText = get_post_meta( $post->ID, '_cmb_main_text', true );

					?>
					<div class="intro" style="background-image: url(<?php echo $mainImageUrl; ?>);">
						<div class="text">
							<?php echo $mainImageText;?>
						</div>
					</div>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
</div>