<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $text = get_post_meta( $post->ID, '_cmb_hp_our_differences', true ); ?>
			<div id="differences" class="differences row">
				<div class="container">
					<div class="col-md-12">
						<div class="text">
							<?php echo $text; ?>
						</div>
						<?php $the_query = new WP_Query(array(
							'post_type' => 'difference'
						));
						?>
						<div>
							<ul class="list">
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
										<a class="demo-link <?php echo $readMoreClass; ?>" href="<?php echo get_permalink(); ?>"><?php _e('Learn more'); ?>
											<svg class="tip" height="26" width="14">
						                		<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/>
						            		</svg>
										</a>
									</div>
								</li>
							<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
			<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
<?php endif; ?>