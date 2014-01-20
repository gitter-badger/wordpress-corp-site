<?php
/*
Template Name: Resources
*/
get_header(); ?>
	<div id="content">
		<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

		<div class="sub-navigation">
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
					<li class="menu-item">
						<a href="#faq" class="smoothScroll">
							<?php _e('Faq'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#blog-posts" class="smoothScroll">
							<?php _e('Blog'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#featured-videos" class="smoothScroll">
							<?php _e('Videos'); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<?php include(locate_template('template-parts/tpl-partial-news.php')); ?>

		<div id="case-studies" class="theme_bg_light section case-studies-resources">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9"><?php _e('Latest Case Studies'); ?></h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
			<?php include(locate_template('template-parts/tpl-partial-case-studies-columns.php')); ?>
		</div>

		<?php include(locate_template('template-parts/tpl-partial-white-papers.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-faq.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-posts.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-featured-videos.php')); ?>


	</div>
<?php get_footer(); ?>