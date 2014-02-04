
	<div id="footer" class="theme_bg_darker">
		<div class="container">
			<div class="row padd-row">
				<div id="latest-tweets" class="col-md-4">
					<?php
						if ( ! dynamic_sidebar( 'Footer Left sidebar' ) ) {
						}?>

				</div>
				<div id="latest-blog-posts" class="col-md-4">
					<h2 class="title"><?php _e('Latest Blog Posts');?></h2>
					<?php
						if ( ! dynamic_sidebar( 'Footer Middle sidebar' ) ) {
						}?>
					<?php
						$sticky = get_option( 'sticky_posts' );
						$postsPerPage = 5;
					    $q = new WP_Query(array(
					        'post_type' => 'blog_posts',
					        'posts_per_page' => $postsPerPage,
					        'post__not_in' => $sticky,
					        'paged'=>$paged
					    ));
				    ?>

				    <?php if ( $q->have_posts() ) : ?>
						<?php while ( $q->have_posts() ) : $q->the_post(); ?>
							<li class="row">
								<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>

				</div>
				<div id="usefull-links" class="col-md-4">
					<?php
						if ( ! dynamic_sidebar( 'Footer Right sidebar' ) ) {
						}?>
				</div>
			</div>
		</div>
	</div><!--end footer-->

	<div id="company-information" class="theme_bg_pitch_black">
		<div class="container">
			<div class="row padd-row">
				<span class="title address">
					<?php echo get_option("cvo_notifications_company_address"); ?></span>
				<span class="title phone">
					<?php echo get_option("cvo_notifications_company_phone"); ?></span>
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