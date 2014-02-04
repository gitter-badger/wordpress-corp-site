<?php $globalPostId = $post->ID; ?>
<?php query_posts( ['post_type'=>'case_study','posts_per_page'=>3, 'post__not_in' => array($globalPostId) ]); ?>

<div id="case-studies" class="case-studies smoothScroll">
<ul class="list">
@wpposts
	<li class="padd-row clearfix">
		<div class="container">
			<div class="col-md-8">
				<a href="{{ the_permalink() }}">{{ the_title() }}</a>
			</div>
			<div class="col-md-4">
				{{ get_demo_link('orange', get_permalink(),  __('Read More')) }}
			</div>
		</div>
	</li>
	<li class="seperator-horizontal"></li>
@wpempty
@wpend
</ul>
</div>
<?php rewind_posts(); ?>