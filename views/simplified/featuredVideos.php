<?php query_posts( ['post_type'=>'video','posts_per_page'=>3 ]); ?>
<div class="container">
	<div class="row padd-row">
		<ul class="videos-list rainbow-list">
			@wpposts
			    <li class="video-item col-md-4">
					<a href="{{ get_permalink() }}">
						<h4 class="title ellipsis">{{ the_title() }}</h4>
						@if(has_post_thumbnail( $post->ID ))
							<div class="video-thumbnail">
								{{ the_post_thumbnail('video-large') }}
							<span class="play-icon"></span></div>
						@else
							<div class="video-no-thumbnail">
								<span class="play-icon"></span>
							</div>
						@endif
					</a>
				</li>
			@wpempty
			@wpend
		</ul>
	</div>
</div>
<?php rewind_posts(); ?>
