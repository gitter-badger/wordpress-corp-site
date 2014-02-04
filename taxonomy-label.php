<?php get_header(); ?>


	<?php

		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$label = (get_query_var('label')) ? get_query_var('label') : '';
		$postsPerPage = 3;
		$q = new WP_Query(array(
			'post_type' => 'faq',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'label',
					'field' => 'slug',
					'terms' => array($label)
				)
			)

		));
	?>
<div id="single-post-page">
<div id="content" class="">
		<?php
			$label = (get_query_var('label')) ? get_query_var('label') : '';
			breadcrumbs(array(
					'theme' => 'theme_bg_dark',
					'trail' => array(
						array('url' => site_url('/'), 'title' => __('Home')),
						array('url' => site_url('/resources'), 'title' => __('Resources')),
						array('url' => site_url('/resources/faq'), 'title' => __('Faq'))
					),
					'child' => getShortName($label)
				));
			?>


	<div class="faq-list">
		<div class="row theme_bg_lighter section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12"><?php _e('Frequently Asked Questions'); ?></h2>
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
			<div class="row">
				<?php if ( $q->have_posts() ) : ?>
					<ul>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
						<li>
							<div class="row">
								<div class="container">

									<div class="col-md-2 faq-icon faq-row">
										<span class="question-icon <?php echo $COLOR_CLASSES[$cssClassIndex];?>">?</span>
									</div>
									<div class="faq-item col-md-10 faq-row">
										<h4 class="title question toggler <?php echo $COLOR_CLASSES[$cssClassIndex];?>"><?php the_title(); ?></h4>
										<div class="answer">
											<?php the_excerpt(); ?></div>
										<div><?php echo get_demo_link($COLOR_CLASSES[$cssClassIndex], get_permalink(), __('Read More')); ?>
										</div>

									</div>
								</div>
							</div>
						</li>
						<li class="seperator-horizontal"></li>
					<?php $index += 1; endwhile; ?>
					</ul>
					<?php endif; ?>
			</div>
		</div>
		<?php echo get_pagination_html($q, 'faq'); ?>
	</div>
</div>

</div>div>
<?php get_footer(); ?>