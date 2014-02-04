<?php query_posts( ['post_type'=>'faq','posts_per_page'=>3 ]); ?>
<div class="container">
	<div class="row padd-row">
		<ul class="faq-list rainbow-list">
		@wpposts
		    <li class="item col-md-4">
				<h4 class="title ellipsis question toggler">
					<a href="{{ the_permalink() }}">{{ the_title() }}</a>
				</h4>
				<div class="answer">
					<span class="question-icon-small bg">?</span>
					{{ limit_words(get_the_excerpt(), 25) }}
				</div>
			</li>
		@wpempty
		@wpend
		</ul>
	</div>
</div>
<?php rewind_posts(); ?>
