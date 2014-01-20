<?php
get_header();

?>
	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<ul id="links" class="nav center-block">
					<li class="menu-item"><a href="<?php echo site_url('/about#team'); ?>" class="smoothScroll"><?php _e('Team'); ?></a></li>
					<li class="menu-item"><a href="<?php echo site_url('/about#customers'); ?>" class="smoothScroll"><?php _e('Customers'); ?></a></li>
					<li class="menu-item"><a href="<?php echo site_url('/about#partners'); ?>" class="smoothScroll"><?php _e('Partners'); ?></a></li>
					<li class="menu-item"><a href="<?php echo site_url('/about/careers'); ?>" class="smoothScroll"><?php _e('Careers'); ?></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php
		$postsPerPage = 3;
		$postsPerRow = 4;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$label = (get_query_var('careers')) ? get_query_var('careers') : '';
		$q = new WP_Query(array(
			'post_type' => 'career',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'careers',
					'field' => 'slug',
					'terms' => array($label)
				)
			)

		));
	?>
	<div class="careers-list">
		<div class="row padd-row theme_bg_lighter">
			<div class="container">
				<div class="col-md-9">

				<?php if ( $q->have_posts() ) : ?>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
					<?php $location = get_post_meta( $post->ID, '_cmb_job_location', true ); ?>
					<div class="row padd-row">
						<div class="career-item col-md-9">
							<h4 class="title <?php echo $COLOR_CLASSES[$cssClassIndex];?>"><?php the_title(); ?></h4>
							<h5 class="the-time dimmed">uploaded on: <?php the_time('M d, Y');?></h5>
							<h3 class="the-time dimmed"><?php echo $location;?></h3>
							<div class="answer"><?php the_excerpt(); ?></div>
						</div>
						<div class="col-md-3">
							<div><?php echo get_demo_link($COLOR_CLASSES[$cssClassIndex], get_permalink(), __('Read More')); ?></div>
						</div>
					</div>
					<?php $index += 1; endwhile; ?>
					<?php endif; ?>

					<div class="pagination center-block">
						<?php echo get_pagination($q, 'career'); ?>
					</div><!-- #post-navigation -->
				</div>
				<div class="col-md-3 sidebar">
					<div class="tag-cloud">
						<?php wp_tag_cloud( array(
							'taxonomy' => 'careers',
							'format' => 'flat',
							'smallest'  => 14,
	    					'largest' => 14,
	    					'unit'  => 'px',
						)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>