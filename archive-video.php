<?php
/*
Template Name: Videos
*/
get_header();
 ?>
<?php
	$postsPerPage = 2;
	$q = new WP_Query(array(
		'post_type' => 'video',
		'posts_per_page' => $postsPerPage,
		'meta_key' => '_cmb_is_featured',
		'meta_value' => 'on',
		'meta_query' => array(array('key' => '_thumbnail_id'))
	));
?>
	<div class="featured-videos header-area">
		<div class="padd-row theme_bg_darker">
			<div class="container">
			<?php $sticky = []; ?>
			@if ( $q->have_posts() )
				@while ( $q->have_posts() )
					<?php $q->the_post(); ?>
					<?php array_push($sticky, $post->ID);?>
						<div class="video-item col-md-6">
						<a href="<?php echo get_permalink();?>">
							@if(has_post_thumbnail( $post->ID ))
								<div class="video-thumbnail">
									{{ the_post_thumbnail('video-large')}}
									<span class="play-icon"></span>
								</div>
							@else
								<div class="video-no-thumbnail">
									<span class="play-icon"></span>
								</div>
							@endif
						</a>
						<h5 class="the-time dimmed">
							{{ __('uploaded on:')}} {{ the_time('M d, Y') }}
						</h5>
						<h4 class="title ellipsis">
							{{ the_title() }}
						</h4>
						<div>
							{{ get_demo_link('orange', get_permalink(), __('View Video')) }}
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="sub-navigation">
		<div class="container">
			<?php $active = 'video'; ?>
			@include('views.common.resourcesNavigation')
		</div>
	</div>

	{{ getBreadcrumns(['trail' => [[site_url('/resources'),__('Resources')]],'child' =>  __('Videos')]) }}

	<?php $q = wpQuery('video', 8, get_page_number(), $exclude = $sticky); ?>
	<div class="more-videos section">
		{{ getSectionTitle(__('Videos')) }}
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
						<div>{{ get_demo_link('orange', get_permalink(), __('View Video')) }}</div>
					</div>
			@endwhile
		@endif
		</div>
			</div>
		</div>
	</div>

	{{get_pagination_html($q, 'video') }}

<?php get_footer(); ?>