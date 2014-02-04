<?php query_posts( ['post_type'=>'blog_posts','posts_per_page'=>3 ]); ?>

<div class="container">
	<div class="row padd-row">
		<ul class="blog-posts-list">
		@wpposts
		    <li class="item col-md-4 hover-yellow">
				<h2 class="title ellipsis">
					<a href="{{ the_permalink() }}">{{ the_title() }}</a>
				</h2>
				{{ limit_words(get_the_excerpt(), 25) }}
			</li>
		@wpempty
		@wpend
		</ul>
	</div>
</div>
<?php rewind_posts(); ?>