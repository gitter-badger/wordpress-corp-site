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
							<div>
								<a class="demo-link pink" href="<?php echo get_permalink(); ?>"><?php _e('View'); ?>
									<svg class="tip" height="26" width="14">
				                		<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/>
				            		</svg>
								</a>
							</div>
						</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

<div class="row sub-navigation">
	<div class="container">
		<?php $active = 'blog'; ?>
		<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
	</div>
</div>


<div class="row">
		<div class="container">
			<div class="row padd-row posts">
						<div class="col-md-9">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="post-row">
							<div class="col-md-4 padd-row">
								<?php if(has_post_thumbnail( $post->ID )): ?>
									<div class="blog-post-thumbnail"><?php the_post_thumbnail('video-normal');?>
									</div>
								<?php else:?>
									<div class="blog-post-no-thumbnail">
									</div>
								<?php endif;?>
							</div>
							<div class="col-md-8 padd-row">
								<h3 class="post-title title">
								  <?php the_title(); ?>
								</h3>
								<p class="dimmed"><?php _e('posted on') ?> <?php the_time( __( 'F jS, Y', 'convertro' ) ); ?></p>
								<p class="categories"><span><?php _e('Categories:');?></span> <?php the_category(', '); ?></p>
								<div class="entry">
									<?php echo limit_words(get_the_excerpt(), '25'); ?> ...
								</div><!--end entry-->
								<div>
									<a class="demo-link teal" href="<?php echo get_permalink(); ?>"><?php _e('Read more'); ?>
										<svg class="tip" height="26" width="14">
					                		<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/>
					            		</svg>
									</a>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<div class="col-md-3 sidebar">
					<?php
					if ( ! dynamic_sidebar( 'Blog sidebar' ) ) {
					}?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>