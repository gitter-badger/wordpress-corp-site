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
				<ul id="links" class="nav center-block">
					<li class="menu-item"><a href="#strengths" class="smoothScroll">link 1</a></li>
					<li class="menu-item"><a href="#differences" class="smoothScroll">link 2</a></li>
					<li class="menu-item"><a href="#case-studies" class="smoothScroll">link 3</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php get_footer(); ?>