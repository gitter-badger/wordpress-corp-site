<?php
/*
Template Name: News
*/
get_header();
?>
	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'news'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 7;
		$q = new WP_Query(array(
			'post_type' => 'news',
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
			'child' => __('News')
		));
	?>
	<div class="theme_bg_white section">
		<div class="section-title theme_bg_lighter">
			<div class="container">
				<h2 class="title col-md-12"><?php _e('News'); ?></h2>
			</div>
		</div>
		<div class="news-list">
			<div class="white-papers-list zebra-light">
				<ul class="clearfix">
					<?php if ( $q->have_posts() ) : ?>
						<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
						<?php $cssClassIndex = $index % 4; ?>
						<li class="padd-row">
							<div class="container">
								<h4 class="title question toggler <?php echo $cssClasses[$cssClassIndex];?>"><?php the_title(); ?></h4>
								<div class="answer the-content"><?php the_content(); ?></div>
							</div>
						</li>
						<li class="seperator-horizontal"></li>
						<?php $index += 1; endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<?php echo get_pagination_html($q, 'news'); ?>
	</div>
<?php get_footer(); ?>