<?php
get_header(); ?>
	<div id="content" class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
					<div id="hp-intro" class="row">
						<div class="container">
							<div class="row">
								<div class="hp-intro-table col-md-12">
									<?php the_content();?>
								</div>
							</div>
						</div>
					</div>

			<?php endwhile; ?>
		<?php endif; ?>
		<div class="row sub-navigation">
			<div class="container">
				<ul class="nav center-block">
					<?php if ( ! dynamic_sidebar( 'General page sidebar' ) ) {}?>
				</ul>
			</div>
		</div>
	</div>
<?php get_footer(); ?>