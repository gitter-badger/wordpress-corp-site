<?php
/*
Template Name: H page
Description: A Page Template for the front page.
*/
get_header(); ?>
	<?php the_post(); ?>
		<div id="page-<?php the_ID(); ?>" class="container">
			<?php if ( has_post_thumbnail() ) { ?>
				<div>
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
<?php get_footer(); ?>