<?php get_header(); ?>

	<?php
		$sticky = get_option( 'sticky_posts' );
		$postsPerPage = 2;
		$q = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => $postsPerPage,
			'post__in' => $sticky
		));
	?>
	<div class="featured-blog-posts">
		<div class="row padd-row theme_bg_darker">
			<div class="container">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); ?>
						<div class="blog-post-item col-md-6">
							<a href="<?php echo get_permalink();?>">
								<?php if(has_post_thumbnail( $post->ID )): ?>
									<div class="blog-post-thumbnail"><?php the_post_thumbnail('video-large');?>
									</div>
								<?php else:?>
									<div class="blog-post-no-thumbnail">
									</div>
								<?php endif;?>
							</a>
							<h5 class="the-time">uploaded on: <?php the_time('M d, Y');?></h5>
							<h4 class="title"><?php the_title(); ?></h4>
							<div><?php echo get_demo_link('pink', get_permalink(), __('View')); ?></div>

						</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>



	<div class="row sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'faq'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 3;
		$postsPerRow = 4;
		$q = new WP_Query(array(
			'post_type' => 'faq',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
		));
	?>
	<div class="faq-list">
		<div class="row padd-row">
			<div class="container">
				<div class="col-md-9">

				<?php if ( $q->have_posts() ) : ?>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
							<div class="col-md-2 faq-icon faq-row">
								<span class="question-icon bg-<?php echo $cssClasses[$cssClassIndex];?>">?</span>
							</div>
							<div class="faq-item col-md-10 faq-row">
								<h4 class="title question toggler <?php echo $cssClasses[$cssClassIndex];?>"><?php the_title(); ?></h4>
								<div class="answer"><?php the_excerpt(); ?></div>
								<div><?php echo get_demo_link($cssClasses[$cssClassIndex], get_permalink(), __('Read More')); ?></div>

							</div>
					<?php $index += 1; endwhile; ?>
					<?php endif; ?>
					<div class="pagination center-block">
					<?php echo paginate_links( array(
						'base' => str_replace( 90, '%#%', esc_url( get_pagenum_link( 90 ) ) ),
						'format' => '?faq=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $q->max_num_pages
					) );?>
			</div><!-- #post-navigation -->
				</div>
				<div class="col-md-3 sidebar">
					<div class="tag-cloud">
						<?php wp_tag_cloud( array(
							'taxonomy' => 'label',
							'format' => 'flat',
							'smallest'  => 14,
	    					'largest' => 14,
	    					'unit'  => 'px',
						)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>