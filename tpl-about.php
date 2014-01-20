<?php
/*
Template Name: About
*/
get_header(); ?>
	<div id="content" class="about-page">
		<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); $postId = $post->ID ?>


					<?php
					$mainImageUrl = get_post_meta( $postId, '_cmb_main_image', true );
					$mainImageText = get_post_meta( $postId, '_cmb_main_text', true );
					$storyImage = get_post_meta( $postId, '_cmb_story_thumb', true );
					$storyText = get_post_meta( $postId, '_cmb_story_text', true );
					$citation = get_post_meta( $postId, '_cmb_story_citation', true );
					?>


			<div class="sub-navigation">
				<div class="container">
					<ul id="links" class="nav center-block">
						<li class="menu-item"><a href="#team" class="smoothScroll"><?php _e('Team'); ?></a></li>
						<li class="menu-item"><a href="#customers" class="smoothScroll"><?php _e('Customers'); ?></a></li>
						<li class="menu-item"><a href="#partners" class="smoothScroll"><?php _e('Partners'); ?></a></li>
						<li class="menu-item"><a href="<?php echo site_url('/about/careers'); ?>" class="smoothScroll"><?php _e('Careers'); ?></a></li>
					</ul>
				</div>
			</div>
			<?php
				breadcrumbs(array(
					'theme' => 'theme_bg_dark',
					'trail' => array(
						array('url' => site_url('/'), 'title' => __('Home')),
					),
					'child' => __('About')
				));
			?>
			<div class="theme_bg_light section story-section">

				<div class="container">
					<div class="col-md-6">
						<div class="citation">

							<div class="single-executive-member image"><img src="<?php echo $storyImage; ?>"/></div>
							<div class="text"><?php echo $citation; ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<?php echo $storyText; ?>
					</div>
				</div>
			</div>
		 <?php endwhile; ?>
		<?php endif; ?>

		<?php include(locate_template('template-parts/tpl-partial-team-executive.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-team.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-customers.php')); ?>
		<?php include(locate_template('template-parts/tpl-partial-partners.php')); ?>
	</div>
<?php get_footer(); ?>