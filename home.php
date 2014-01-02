<?php get_header(); ?>
<div id="container">
	<div id="content">
		<p>Convertro Home</p>
		<?php get_template_part( 'allPostsLoop' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>