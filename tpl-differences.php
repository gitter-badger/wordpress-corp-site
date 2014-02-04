<?php
/*
Template Name: Differences
*/
get_header();
?>

@include('views.common.header')

<?php
breadcrumbs(array(
	'theme' => 'theme_bg_dark',
	'trail' => array(
		array('url' => site_url('/'), 'title' => __('Home')),
		array('url' => site_url('/why-convertro'), 'title' => __('Why Convertro')),
	),
	'child' => $post->post_title
));
?>
<div id="content" class="strengths-page theme_bg_lighter section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12"><?php echo $post->post_title; ?></h2>
		</div>
	</div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php global $more; ?>
					<div class="container">
						<div class="col-md-8">
							<div class="the-content"><?php the_content();?></div>
						</div>
						<div class="col-md-4">
							<?php the_post_thumbnail();?>
						</div>
					</div>
			<?php endwhile; ?>
		<?php endif; ?>

<?php get_footer(); ?>