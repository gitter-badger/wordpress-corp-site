<?php
/*
Template Name: Faq
*/
get_header();

?>
	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'faq'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
	</div>

	<?php
		$postsPerPage = 5;
		$q = new WP_Query(array(
			'post_type' => 'faq',
			'posts_per_page' => $postsPerPage,
			'paged'=> get_page_number(),
		));
	?>
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
	<div class="faq-list">
		<div class="theme_bg_lighter section">
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

			<div class="">
				<?php if ( $q->have_posts() ) : ?>
					<ul>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
						<li>
							<div class="">
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

<?php get_footer(); ?>