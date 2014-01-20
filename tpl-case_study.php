<?php
/*
Template Name: Case studies
*/
get_header();
?>
	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'case-study'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 10;
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
		<div class="row theme_bg_light section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('Study Cases'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
			<div class="container">
				<?php if ( $q->have_posts() ) : ?>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
					<?php $icon = get_post_meta( $post->ID, '_cmb_icon', true ); ?>
					<?php $pdf = get_post_meta( $post->ID, '_cmb_pdf', true ); ?>
				<li class="row padd-row">
					<div class="col-md-3">
						<div class="logo">
							<div>
								<img src="<?php echo $icon; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-9 <?php echo $cssClasses[$cssClassIndex];?>">
							<h4 class="title question toggler <?php echo $cssClasses[$cssClassIndex];?>">
								<a href="<?php the_permalink();?>">
									<?php the_title(); ?>
								</a>
							</h4>
							<div class="answer"><?php the_content(); ?></div>
							<a class="pdf-link link pink" target="_blank" href="<?php echo $pdf; ?>">
								<i class="icon fa-2x fa fa-cloud-download"></i><?php _e('PDF') ?>
							</a>

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