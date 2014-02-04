<?php
/*
Template Name: Careers
*/
get_header();

?>
	@include('views.common.header')

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<ul id="links" class="nav center-block">
					<li class="menu-item"><a href="<?php echo site_url('/about#team'); ?>" class="smoothScroll"><?php _e('Team'); ?></a></li>
					<li class="menu-item"><a href="<?php echo site_url('/about#customers'); ?>" class="smoothScroll"><?php _e('Customers'); ?></a></li>
					<li class="menu-item"><a href="<?php echo site_url('/about#partners'); ?>" class="smoothScroll"><?php _e('Partners'); ?></a></li>
					<li class="menu-item current-menu-item"><a href="<?php echo site_url('/about/careers'); ?>" class="smoothScroll"><?php _e('Careers'); ?></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php
		$postsPerPage = 10;
		$q = new WP_Query(array(
			'post_type' => 'career',
			'posts_per_page' => $postsPerPage,
			'paged'=> get_page_number(),
		));
	?>
	<div class="careers-list">
		<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
				array('url' => site_url('/about'), 'title' => __('About'))
			),
			'child' => __('Careers')
		));
		?>

		<div class="row theme_bg_lighter section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('Careers'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col-md-9">

					<?php if ( $q->have_posts() ) : ?>
						<ul>
							<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
							<?php $cssClassIndex = $index % 4; ?>
							<?php $location = get_post_meta( $post->ID, '_cmb_job_location', true ); ?>
							<?php $jobLink = get_post_meta( $post->ID, '_cmb_job_link', true ); ?>
							<li class="row padd-row">
								<div class="career-item col-md-10">
									<h4 class="title <?php echo $COLOR_CLASSES[$cssClassIndex];?>"><?php the_title(); ?></h4>
									<h5 class="the-time dimmed">uploaded on: <?php the_time('M d, Y');?></h5>
									<h3 class="the-time dimmed"><?php echo $location;?></h3>
									<div class="answer"><?php the_excerpt(); ?></div>
								</div>
								<div class="col-md-2 align-right">
									<div><?php echo get_demo_link($COLOR_CLASSES[$cssClassIndex], $jobLink, __('Apply'), array('target' => true)); ?></div>
								</div>
							</li>
							<li class="seperator-horizontal"></li>
							<?php $index += 1; endwhile; ?>
						</ul>
						<?php endif; ?>

						<div class="pagination center-block">
							<?php echo get_pagination($q, 'career'); ?>
						</div><!-- #post-navigation -->
					</div>
					<div class="col-md-3 sidebar">
						<div class="tag-cloud">
							<h2 class="title"><?php _e('Jobs Tags'); ?></h2>
							<div class="seperator"></div>
							<?php wp_tag_cloud( array(
								'taxonomy' => 'careers',
								'format' => 'flat',
								'smallest'  => 13,
		    					'largest' => 13,
		    					'unit'  => 'px',
							)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>