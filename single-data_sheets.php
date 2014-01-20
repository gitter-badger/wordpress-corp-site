<?php
get_header(); ?>

<div class="single-post-page">
	<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
				array('url' => site_url('/resources/blog'), 'title' => __('Blog'))
			),
			'child' => substr(get_the_title(), 0,15) .' [...] ' . substr(get_the_title(), -15)
		));
	?>


	<div id="content" class="row">
		<div class="section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12"><h2 class="title"><?php _e('Data Sheet') ?>: <?php the_title(); ?></h2></h2>

				</div>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $pdf = get_post_meta( $post->ID, '_cmb_pdf', true ); ?>


				<div class="row theme_bg_lighter">
					<div class="container">
						<div class="col-md-9 post-content">
								<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>