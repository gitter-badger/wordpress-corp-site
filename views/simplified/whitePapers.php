<?php query_posts( ['post_type'=>'white_paper','posts_per_page'=>3 ]); ?>
<div class="container">
	<div class="row padd-row">
		<ul class="white-papers-list">
		@wpposts
		    <li class="item col-md-4 hover-{{ wpMeta($post->ID, 'read_more_color') }}">
				<a href="{{ the_permalink() }}">
					<div>
						<div>
							<a class="icon bg-{{ wpMeta($post->ID, 'read_more_color') }}" href="{{ site_url('/resources/white-paper') }}"></a>
						</div>
						<h2 class="title"><a href="{{ site_url('/resources/white-paper') }}">{{ the_title() }}</a></h2>
						{{ the_excerpt() }}
					</div>
				</a>
			</li>
		@wpempty
		@wpend
		</ul>
	</div>
</div>
<?php rewind_posts(); ?>