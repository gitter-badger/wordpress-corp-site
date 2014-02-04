
<?php query_posts( ['post_type'=>'case_study','posts_per_page'=>3 ]); ?>
<div class="container">
	<div class="row padd-row">
		<ul class="case-studies-list">
		@wpposts
		    <li class="item col-md-4 hover-yellow">
				<a href="{{ the_permalink() }}">
					<div class="logo">
						<img src="{{ wpMeta($id = $post->ID, $key = 'icon') }}">
					</div>
					{{ the_title() }}
				</a>
			</li>
		@wpempty
		@wpend
		</ul>
	</div>
</div>
<?php rewind_posts(); ?>
