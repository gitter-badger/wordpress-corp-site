<?php
/*
Template Name: Case studies
*/
get_header();
?>
	@include('views.common.header')

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'case-study'; ?>
				@include('views.common.resourcesNavigation')
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 5;
		$q = new WP_Query(array(
			'post_type' => 'case_study',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
		));
	?>
	<?php
	breadcrumbs(array(
		'theme' => 'theme_bg_dark',
		'trail' => array(
			array('url' => site_url('/'), 'title' => __('Home')),
			array('url' => site_url('/resources'), 'title' => __('Resources'))
		),
		'child' => __('Case Studies')
	));
	?>
	<div class="study-cases-list">
		<div class="theme_bg_light section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('Case Studies'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
			<div class="container">
				<?php if ( $q->have_posts() ) : ?>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
					<?php $icon = get_post_meta( $post->ID, '_cmb_icon', true ); ?>
					<?php $pdf = get_post_meta( $post->ID, '_cmb_pdf', true ); ?>
						<li class="padd-row clearfix">
							<div class="col-md-2">
								<div class="logo">
									<div class="sidebar">
										<img src="<?php echo $icon; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-10">
									<h4 class="title question toggler">
										<a href="<?php the_permalink();?>">
											<?php the_title(); ?>
										</a>
									</h4>
									<div class="<?php echo $cssClasses[$cssClassIndex];?>">
									<div class="answer"><?php global $more; $more = 0; the_content(); ?></div>
									<a class="pdf-link link pink" target="_blank" href="<?php echo $pdf; ?>">
										<i class="icon fa-2x fa fa-cloud-download"></i><?php _e('PDF') ?>
									</a>
									<?php echo get_demo_link($cssClasses[$cssClassIndex], get_permalink(),  __('Read More')); ?>
									</div>

							</div>
						</li>
						<li class="seperator-horizontal"></li>
					<?php $index += 1; endwhile; ?>
				<?php endif; ?>

			</div>
			<?php echo get_pagination_html($q, 'study-case'); ?>
		</div>
	</div>

<?php get_footer(); ?>