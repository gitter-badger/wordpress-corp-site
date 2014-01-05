<?php
get_header(); ?>

<div class="single-post-page">
	<div id="content" class="row">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row theme_bg_light padd-row">
					<div class="container">
						<div class="col-md-12">
							<nav class="breadcrumbs">
								<a href="<?php echo site_url('/resources/blog');?>">
									<?php _e('Blog'); ?>
								</a>
								<span class="seperator">&raquo;</span>
								<span class="current"><?php echo substr(get_the_title(), 0,15); ?> [...] <?php echo substr(get_the_title(), -15); ?></span>
							</nav>
						</div>
					</div>
				</div>
				<div class="row theme_bg_white padd-row">
					<div class="container">
						<div class="col-md-9">
							<h2 class="title"><?php the_title(); ?></h2>
							<div class="main-image padd-row">
								<?php the_post_thumbnail();?>
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