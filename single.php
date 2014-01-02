<?php
get_header(); ?>

<div class="single-post-page">
	<div id="content" class="row">
		<div class="row sub-navigation">
			<div class="container">
				<?php $active = 'blog'; ?>
				<?php include(locate_template('template-parts/tpl-partial-resources-navigation.php')); ?>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<div class="container">
						<div class="col-md-9">
							<h2 class="title"><?php the_title(); ?></h2>
							<div class="main-image padd-row">
								<?php the_post_thumbnail('video-large');?>
							</div>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-md-3 sidebar">
							<?php
							if ( ! dynamic_sidebar( 'Blog sidebar' ) ) {
							}?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>