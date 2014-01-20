<?php
get_header();
?>
<div id="single-faq-page">
	<div class="row theme_bg_light">
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

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'faq'; ?>
			<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
		</div>
	</div>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row padd-row">
					<div class="container">
						<div class="faq-item col-md-9">
							<div class="col-md-2 faq-icon faq-row">
								<span class="question-icon bg-<?php echo $COLOR_CLASSES[0];?>">?</span>
							</div>
							<div class="faq-item col-md-10 faq-row">
								<h4 class="title <?php echo $COLOR_CLASSES[0];?>"><?php the_title(); ?></h4>

								<div class="the-taxonomies"><?php the_taxonomies();  ?></div>
								<div><?php the_content(); ?></div>
							</div>
						</div>

						<div class="col-md-3 sidebar">
							<div class="tag-cloud">
								<?php wp_tag_cloud( array(
									'taxonomy' => 'label',
									'format' => 'flat',
									'smallest'  => 14,
			    					'largest' => 14,
			    					'unit'  => 'px',
								)); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="pagination center-block">
						<span class="prev page-numbers"><?php echo previous_post_link('%link', '« Previous faq'); ?></span>
						<span class="next page-numbers"><?php echo next_post_link('%link', 'Next faq »'); ?></span>
					</div>


				</div>
		<?php endwhile; ?>
		<?php endif; ?>

</div>
<?php get_footer(); ?>