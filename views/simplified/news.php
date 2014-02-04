<?php query_posts( ['post_type'=>'news','posts_per_page'=>3 ]); ?>
	<div class="container">
		<div class="row padd-row">
			<ul class="news-list rainbow-list">
			@wpposts
			    <li class="item col-md-4">
					<h2 class="title ellipsis">
						<a href="{{ site_url('/resources/events') }}">{{ the_title() }}</a>
					</h2>
					{{ the_excerpt() }}
				</li>
			@wpempty
			@wpend
			</ul>
		</div>
	</div>
<?php rewind_posts(); ?>
