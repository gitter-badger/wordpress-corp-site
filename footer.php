
	<div id="footer" class="row theme_bg_darker">
		<div class="container">
			<div class="row">
				<div id="latest-tweets" class="col-md-4">
					<h2>Latest Tweets</h2>
				</div>
				<div id="latest-blog-posts" class="col-md-4">
					<h2>Latest Blog Posts</h2>

				</div>
				<div id="usefull-links" class="col-md-4">
					<h2>Useful Links</h2>
					<?php wp_nav_menu( array('menu' => 'Footer → Useful links' )); ?>
				</div>
			</div>
		</div>
	</div><!--end footer-->
</div><!--end container-->
</div>
<?php wp_footer(); ?>
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
<script>
	var $ = jQuery.noConflict();
	$(document).ready(function () {
		var index,
			$items = $('.strengths.tabs').find('.item');

		$items.bind('click', function (a,b) {
			index = ($items.index($(this)));
			$items.removeClass('active');
			$(this).addClass('active')
			$('.strengths.content')
				.hide()
				.removeClass('active')
				.eq(index)
				.addClass('active')
				.show();
		});

	});

</script>
</body>
</html>