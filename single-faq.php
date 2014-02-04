<?php
get_header();
?>
<div id="single-faq-page single-post-page">

	<div id="content" class="">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); $globalPostId = $post->ID; ?>
			<?php
				breadcrumbs(array(
					'theme' => 'theme_bg_dark',
					'trail' => array(
						array('url' => site_url('/'), 'title' => __('Home')),
						array('url' => site_url('/resources'), 'title' => __('Resources'))
					),
					'child' => __('Faq')
				));
			?>
				<div class="section">
					<div class="section-title">
						<div class="container">
							<h2 class="title col-md-12"><h2 class="title"><?php the_title(); ?></h2></h2>

						</div>
					</div>
				</div>



		<div class="row padd-row">
			<div class="container">
				<div class="faq-item col-md-9">
					<div class="col-md-2 faq-icon faq-row">
						<span class="question-icon bg-<?php echo $COLOR_CLASSES[0];?>">?</span>
					</div>
					<div class="faq-item col-md-10 faq-row">
						<h4 class="title <?php echo $COLOR_CLASSES[0];?>"><?php the_title(); ?></h4>

						<div class="the-taxonomies"><?php the_taxonomies();  ?></div>
						<div class="the-content"><?php the_content(); ?></div>
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

	</div>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>