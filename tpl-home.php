<?php
/*
Template Name: Home page
Description: A Page Template for the front page.
*/
get_header(); ?>
	<div id="content" class="theme_bg_lighter">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
					<div id="hp-intro" class= "padd-row">
						<div class="container">
							<div class="row">
								<div class="hp-intro-table">
									<div class="display-row">
										<div class="display-cell toBottom">
											<div class="text col-md-9">
												<?php the_content();?>
											</div>
										</div>

										<div class="display-cell video">
											<?php
											$text = get_post_meta( $post->ID, '_cmb_hp_video_embed', true );
											echo  wp_oembed_get($text, array('width' => '500'));
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

			<?php endwhile; ?>
		<?php endif; ?>
		<div class="sub-navigation">
			<div class="container">
				<ul id="links" class="nav center-block">
					<li class="menu-item"><a href="#strengths" class="smoothScroll"><?php _e('How it works'); ?></a></li>
					<li class="menu-item"><a href="#differences" class="smoothScroll"><?php _e('Our advantage'); ?></a></li>
					<li class="menu-item"><a href="#case-studies" class="smoothScroll"><?php _e('Case Studies'); ?></a></li>
				</ul>
			</div>
		</div>
		<?php include(locate_template('template-parts/tpl-partial-strengths.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-our-difference.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-case-studies.php')); ?>

	</div>
<?php get_footer(); ?>