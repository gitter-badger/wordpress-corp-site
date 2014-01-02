<?php get_header(); ?>
<h1>BOOOO</h1>
<div id="content" class="clear">
	<?php if ( have_posts() ) : ?>
		<h1 class="small-header"><?php _e( 'Blog Archives', 'convertro' ); ?></h1>
		<?php get_template_part( 'loop' ); ?>
	<?php else : ?>
		<p><?php _e( 'No posts found.', 'convertro' ); ?></p>
	<?php endif; ?>
</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>