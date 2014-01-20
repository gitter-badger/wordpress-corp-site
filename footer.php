
	<div id="footer" class="theme_bg_darker">
		<div class="container">
			<div class="row padd-row">
				<div id="latest-tweets" class="col-md-4">
					<h2 class="title">Latest Tweets</h2>
				</div>
				<div id="latest-blog-posts" class="col-md-4">
					<h2 class="title">Latest Blog Posts</h2>

				</div>
				<div id="usefull-links" class="col-md-4">
					<h2 class="title">Useful Links</h2>
					<?php wp_nav_menu( array('menu' => 'Footer → Useful links' )); ?>
				</div>
			</div>
		</div>
	</div><!--end footer-->
</div><!--end container-->
</div>
<?php wp_footer(); ?>

<script>
	var $ = jQuery.noConflict();
	$(document).ready(function () {
		var index,
			$items = $('.tabs').find('.item');

		$items.bind('click', function (a,b) {
			index = ($items.index($(this)));
			$items.removeClass('active');
			$(this).addClass('active')
			$('.tabs-content')
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