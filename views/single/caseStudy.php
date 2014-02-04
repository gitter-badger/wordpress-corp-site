<div class="single-case-study-page">
	<?php echo getBreadcrumns([
		'trail' => [
			[site_url('/resources/case-studies'),__('Case Studies')]
		],
		'child' => get_the_title()
	]);?>
	<div id="content" class="row">
		<div class="section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12">
						{{ __('Study Cases') }} : {{ the_title() }}</h2>
				</div>
			</div>
		</div>
		<?php $globalPostId; ?>
		@if ( have_posts() )
			@while ( have_posts() )
				<?php the_post(); ?>
				<?php $globalPostId = array($post->ID); ?>
				<div class="row theme_bg_lighter">
					<div class="container">
						<div class="col-md-9 post-content">
								<div class="the-content">{{ the_content() }}</div>
						</div>
						<div class="col-md-3 sidebar">
							<div class="teal">
							<div>{{ __('Download the pdf version') }}</div>
							<a class="pdf-link link pink" target="_blank" href="{{ get_post_meta( $post->ID, '_cmb_pdf', true ) }}">
								<i class="icon fa-4x fa fa-cloud-download"></i>
							</a>
						</div>
						</div>
					</div>
				</div>
			@endwhile
		@endif
	</div>
	<div id="case-studies" class="theme_bg_light section case-studies-resources">
		<div class="section-title">
			<div class="container">
				<h2 class="title col-md-12">{{ __('Other Case Studies') }}</h2>
			</div>
		</div>
		@include('views.moreCaseStudies')
	</div>
</div>
</div>