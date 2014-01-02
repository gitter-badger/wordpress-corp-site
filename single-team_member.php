<?php
get_header(); ?>
	<div id="content" class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $memberName = get_post_meta( $post->ID, '_cmb_member_name', true );?>
			<?php $memberTitle = get_post_meta( $post->ID, '_cmb_member_title', true );?>
			<?php $memberPhoto = get_post_meta( $post->ID, '_cmb_member_photo', true );?>
			<?php $memberDesc = get_post_meta( $post->ID, '_cmb_member_job_description', true );?>
					<div id="single-team-intro" class="row theme_bg_darker">
						<div class="container">
							<div class="row single-executive-member">
								<div class="col-md-2">
									<img src="<?php echo $memberPhoto; ?>"/>
								</div>
								<div class="col-md-10">
									<div><?php echo $memberName; ?></div>
									<div><?php echo $memberTitle; ?></div>
									<div><?php echo $memberDesc; ?></div>
								</div>
							</div>
						</div>
					</div>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>
	<?php include(locate_template('template-parts/tpl-partial-team-executive.php')); ?>
	<?php $args = array('themeBgClass' => 'theme_bg_white'); ?>
	<?php include(locate_template('template-parts/tpl-partial-team.php')); ?>
</div>
<?php get_footer(); ?>