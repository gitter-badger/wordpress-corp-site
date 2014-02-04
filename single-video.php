<?php
get_header();
?>
<div id="single-video-page">
	<div id="content" class="">
		@if ( have_posts() )
			@while ( have_posts() )
				<?php the_post(); ?>
				<?php $globalPostId = $post->ID; ?>
					<div class="single-video-intro theme_bg_darker">
						<div class="container">
							<div class="row">
								<div class="col-md-7">
									<div>
										<?php $text = wpMeta( $post->ID, 'hp_video_embed'); ?>
										<div class="single-video-content">
												@if ($text)
													{{ wp_oembed_get($text, array('width' => '460')) }}
												@endif
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<h2 class="title">{{ the_title() }}</h2>
									<h5 class="the-time">{{ __('uploaded on:') }} {{ the_time('M d, Y') }}</h5>
									<div class="desc">
										<div class="the-content">{{ the_content() }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			@endwhile
		@endif
	</div>

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'video'; ?>
			@include('views.common.resourcesNavigation')
		</div>
	</div>
	{{ getBreadcrumns(['trail' => [[site_url('/resources'),__('Resources')], [site_url('/resources/videos'),__('Videos')]],'child' =>  $post->post_title]) }}

	<?php $q = wpQuery('video', 8, get_page_number(), $exclude = array($globalPostId)); ?>
	<div class="more-videos section">
		{{ getSectionTitle(__('More Videos')) }}
		<div class="container">
		@if ( $q->have_posts() )
			@while ( $q->have_posts() )
				<?php $q->the_post(); ?>
					<div class="video-item col-sm-3">
						<a href="{{ get_permalink() }}">
							@if(has_post_thumbnail( $post->ID ))
								<div class="video-thumbnail">
									{{ the_post_thumbnail('video-normal') }}
									<span class="play-icon"></span>
								</div>
							@else
								<div class="video-no-thumbnail">
									<span class="play-icon"></span>
								</div>
							@endif
						</a>
						<h5 class="the-time dimmed">{{ __('uploaded on:') }} {{ the_time('M d, Y') }}</h5>
						<h4 class="subtitle">{{ the_title() }}</h4>
						<div class="hidden-xs">{{ get_demo_link('orange', get_permalink(), __('View Video')) }}</div>
					</div>
			@endwhile
		@endif
		</div>
			</div>
		</div>
	</div>

	<?php echo get_pagination_html($q, 'video'); ?>

</div>
<?php get_footer(); ?>