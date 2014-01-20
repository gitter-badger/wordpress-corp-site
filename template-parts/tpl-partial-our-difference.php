<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $text = get_post_meta( $post->ID, '_cmb_hp_our_differences', true ); ?>
			<div id="differences" class="differences padd-row">
				<div class="container">
					<div class="col-md-12">

						<div class="text differences-intro">
							<?php echo $text; ?>
						</div>
						<?php $the_query = new WP_Query(array(
							'post_type' => 'difference'
						));
						?>
						<div>
							<ul class="">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php $readMoreClass = get_post_meta( $post->ID,'_cmb_read_more_color', true); ?>
								<li class="list-item row">
									<div class="icon col-md-1">
										<?php the_post_thumbnail();?>
									</div>
									<div class="col-md-7">
										<h2 class="title"><?php the_title(); ?></h2>
										<div class="desc"><?php the_excerpt();?></div>
									</div>
									<div class="col-md-2">
										<?php echo get_demo_link($readMoreClass, get_permalink(),  __('Learn more')); ?>

									</div>
								</li>
							<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
<?php endif; ?>