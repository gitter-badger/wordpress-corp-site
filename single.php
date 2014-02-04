<?php
get_header(); ?>

<div class="single-post-page">


	<div id="content" class="">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); $globalPostId = $post->ID; ?>

			<?php echo getBreadcrumns([
				'trail' => [
					[site_url('/resources'),__('Resources')],
					[site_url('/resources/blog'),__('Blog')],
				],
				'child' => getShortName(get_the_title())
			]);?>
			<div class="section">
				<div class="section-title">
					<div class="container">
						<h2 class="title col-md-12"><h2 class="title"><?php the_title(); ?></h2></h2>

					</div>
				</div>
			</div>

			<div class="theme_bg_lighter">
				<div class="container">
					<div class="col-md-9 post-content">
						<div class="posts-links row">
							<?php $next = get_next_post(); ?>
							<?php $prev = get_previous_post(); ?>
							<?php if (isset($next->ID)) :?>
								<span class="next-post-link text-right">
									<?php echo get_demo_link('yellow', get_permalink($next->ID), __('Newer posts')); ?>
								</span>
							<?php endif; ?>
							<?php if (isset($prev->ID)) :?>
								<span class="prev-post-link text-left">
	<?php echo get_demo_link('yellow', get_permalink($prev->ID), __('Older Posts'), array('icon' => false, 'isFlipped' => true)); ?>
								</span>
							<?php endif; ?>

						</div>
						<div class="post-content">
							<div class="the-content"><?php the_content(); ?></div>
						</div>
					</div>
					<div class="col-md-3 sidebar">
						<?php
						if ( ! dynamic_sidebar( 'Blog Post sidebar' ) ) {
						}?>

						 <div class="widget">
							<h2 class="title"><?php _e('Related Posts'); ?></h2>

						<?php
							$tagsList = tags_object_to_tags_ids(get_the_tags());
							if ($tagsList)
							{
								$q = new WP_Query(array(
									'post_type' => 'post',
									'tag__in' => $tagsList,
									'post__not_in' => array($globalPostId),
									'posts_per_page' => 5,
									'orderby' => 'rand'
								));
								 ?>
								 <?php if ( $q->have_posts() ) : ?>

								 	<ul>
									<?php while ( $q->have_posts() ) : $q->the_post(); ?>
										<li class="cat-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
										<li class="seperator-horizontal"></li>
									<?php endwhile; ?>
									</ul>

								<?php endif; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>