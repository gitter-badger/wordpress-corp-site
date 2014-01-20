<?php get_header(); ?>

	<?php $q = get_sticky_posts(2); ?>
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

	<div class="sub-navigation">
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
		$label = (get_query_var('label')) ? get_query_var('label') : '';
		$postsPerPage = 3;
		$q = new WP_Query(array(
			'post_type' => 'faq',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'label',
					'field' => 'slug',
					'terms' => array($label)
				)
			)

		));
	?>
	<div class="faq-list">
		<div class="row theme_bg_lighter section">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-12"><?php _e('Frequently Asked Questions'); ?></h2>
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
			<div class="row">
				<?php if ( $q->have_posts() ) : ?>
					<ul>
					<?php $index = 4; while ( $q->have_posts() ) : $q->the_post(); ?>
					<?php $cssClassIndex = $index % 4; ?>
						<li>
							<div class="row">
								<div class="container">

									<div class="col-md-2 faq-icon faq-row">
										<span class="question-icon <?php echo $COLOR_CLASSES[$cssClassIndex];?>">?</span>
									</div>
									<div class="faq-item col-md-10 faq-row">
										<h4 class="title question toggler <?php echo $COLOR_CLASSES[$cssClassIndex];?>"><?php the_title(); ?></h4>
										<div class="answer">
											<?php the_excerpt(); ?></div>
										<div><?php echo get_demo_link($COLOR_CLASSES[$cssClassIndex], get_permalink(), __('Read More')); ?>
										</div>

									</div>
								</div>
							</div>
						</li>
						<li class="seperator-horizontal"></li>
					<?php $index += 1; endwhile; ?>
					</ul>
					<?php endif; ?>
			</div>
		</div>
		<?php echo get_pagination_html($q, 'faq'); ?>
	</div>

<?php get_footer(); ?>