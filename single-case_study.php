<?php
get_header(); ?>

<div class="single-case-study-page">
	<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
				array('url' => site_url('/resources/case-studies'), 'title' => __('Case Studies'))
			),
			'child' => substr(get_the_title(), 0,15) .' [...] ' . substr(get_the_title(), -15)
		));
	?>


	<div id="content" class="row">
		<div class="section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12"><h2 class="title"><?php _e('Study Cases') ?>: <?php the_title(); ?></h2></h2>

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
						<div class="col-md-3 sidebar">
							<div class="teal">
							<div><?php _e('Download the pdf version') ?></div>
							<a class="pdf-link link pink" target="_blank" href="<?php echo $pdf; ?>">
								<i class="icon fa-4x fa fa-cloud-download"></i>
							</a>
						</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
			<div id="case-studies" class="theme_bg_light section case-studies-resources">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('Other Case Studies'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
			<?php include(locate_template('template-parts/tpl-partial-case-studies-columns.php')); ?>
		</div>
</div>
</div>
<?php get_footer(); ?>