<?php
/*
Template Name: White paper
*/
get_header();
?>
	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'white-paper'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 10;
		$q = new WP_Query(array(
			'post_type' => 'white_paper',
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
			'child' => __('White Papers')
		));
	?>

	<div class="white-papers-list section">
		<div class="theme_bg_light">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('White Papers'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
		</div>
		<div class="theme_bg_light">



			<?php if ( $q->have_posts() ) : ?>
					<ul>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
					<?php $icon = get_post_meta( $post->ID, '_cmb_icon', true ); ?>
					<?php $pdf = get_post_meta( $post->ID, '_cmb_pdf', true ); ?>
						<li class="padd-row">
							<div class="container">
								<div class="col-md-1">
									<div class="logo">
										<div class="centerize">
											<i class="icon fa-3x fa fa-file-text"></i>
										</div>
									</div>
								</div>
								<div class="col-md-9 <?php echo $cssClasses[$cssClassIndex];?>">
										<h4 class="title"><?php the_title(); ?></h4>
										<div class="answer"><?php the_content(); ?></div>
										<?php echo get_demo_link($cssClasses[$cssClassIndex]. ' request-form', get_permalink(), __('Request')); ?>

								</div>
							<div class="container">
						</li>
						<li class="seperator-horizontal"></li>
					<?php $index += 1; endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="section-read-more">
				<div class="container">
					<div class="pagination center-block">
					<?php echo get_pagination($q, 'white-paper'); ?>
					</div>
				</div>
			</div>
		</div>


	</div>

<?php get_footer(); ?>