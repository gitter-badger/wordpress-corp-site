<?php get_header(); ?>
<div class="single-strength-page single-post-page">
	<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
			),
			'child' => get_the_title()
		));
	?>
	<?php $globalPostId; ?>

	<div id="content" class="row">
		<div class="section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12">
						<span class="title">{{ the_title() }}</span>
					</h2>
				</div>
			</div>
		</div>

		@if ( have_posts() )
			@while ( have_posts() )
				<?php the_post(); ?>
				<?php $globalPostId = array($post->ID); ?>

				<div class="row theme_bg_lighter">
					<div class="container">
						<div class="col-md-8 post-content">
								<div class="the-content">{{ the_content() }}</div>
						</div>
						<div class="col-md-4 sidebar">
							<div class="teal">

						</div>
						</div>
					</div>
				</div>
			@endwhile
		@endif
	</div>

</div>
</div>
<?php get_footer(); ?>