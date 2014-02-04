<?php
/*
Template Name: Why Convertro
*/
get_header();

global $COLOR_CLASSES;

$differences = get_pages(array(
	'parent' => $post->ID,
	'post_type' => 'page',
	'post_status' => 'publish',
	'sort_column' => 'menu_order',
	'hierarchical' => false,
));



breadcrumbs(array(
	'theme' => 'theme_bg_dark',
	'trail' => array(
		array('url' => site_url('/'), 'title' => __('Home')),
	),
	'child' => __('Why Convertro')
));
?>
@include('views.common.header')
<div id="content" class="strengths-page theme_bg_lighter section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12"><?php _e('Why Convertro'); ?></h2>
		</div>
	</div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
				<div class="container">
					<div class="col-md-12">
						<div class="the-content"><?php the_content();?></div>
					</div>
				</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php //echo '<pre>'; print_r($strengths); ?>
	<ul class="strengths-section">
		<?php $cssClassIndex = 0; ?>
		<?php foreach($differences as $difference): ?>
		<?php $icon_active_url = get_post_meta( $difference->ID, '_cmb_icon_off', true );?>
			<li class="grayscalize animate-scale scale-half">
				<span class="seperator-horizontal"></span>

				<div class="container">
					<div class="col-md-12">
						<div class="text">
							<div class="title">
								<span class=""><img src="<?php echo $icon_active_url; ?>" class="scale-item"/></span>
								<?php echo $difference->post_title;  ?>
							</div>
							<?php echo get_the_content_with_formatting($difference->post_content );?>
						</div>
						<div><?php echo get_demo_link( 'gray', get_permalink($difference->ID), __('Read More'));
						 ?>
						</div>

					</div>
				</div>
			</li>

		<?php $cssClassIndex += 1; endforeach; ?>
	</ul>
</div>

<?php get_footer(); ?>