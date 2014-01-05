<?php
/*
Template Name: Resources
*/
get_header(); ?>
	<div id="content" class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); $postId = $post->ID ?>
			<div id="resources" class="row theme_bg_lighter">
				<div class="container">
					<?php
					$mainImageUrl = get_post_meta( $postId, '_cmb_main_image', true );
					$mainImageText = get_post_meta( $postId, '_cmb_main_text', true );

					?>
					<div class="intro" style="background-image: url(<?php echo $mainImageUrl; ?>);">
						<div class="text">
							<?php echo $mainImageText;?>
						</div>
					</div>
				</div>
			</div>

			<?php endwhile; ?>
		<?php endif; ?>
		<div class="row sub-navigation">
			<div class="container">
				<ul id="links" class="nav center-block">
					<li class="menu-item">
						<a href="#news" class="smoothScroll">
							<?php _e('News'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#case-studies" class="smoothScroll">
							<?php _e('Case Studies'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#white-papers" class="smoothScroll">
							<?php _e('White Papers'); ?>
						</a>
					</li>
					<li class="menu-item <?php echo $active == 'faq' ? 'current-menu-item': '' ?>">
						<a href="<?php echo get_post_type_archive_link('faq'); ?>">
							<?php _e('Faq'); ?>
						</a>
					</li>
					<li class="menu-item <?php echo $active == 'blog' ? 'current-menu-item': '' ?>">
						<a href="<?php echo site_url('/resources/blog');?>">
							<?php _e('Blog'); ?>
						</a>
					</li>
					<li class="menu-item <?php echo $active == 'video' ? 'current-menu-item': '' ?>">
						<a href="<?php echo get_post_type_archive_link('video'); ?>">
							<?php _e('Videos'); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<?php include(locate_template('template-parts/tpl-partial-news.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-case-studies-columns.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-white-papers.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-faq.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-posts.php')); ?>


	</div>
<?php get_footer(); ?>