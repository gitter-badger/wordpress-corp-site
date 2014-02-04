<?php
get_header();
	breadcrumbs(array(
		'theme' => 'theme_bg_dark',
		'trail' => array(
			array('url' => site_url('/'), 'title' => __('Home')),
			array('url' => site_url('/about'), 'title' => __('About'))
		),
		'child' => __('Team')
	));
?>


	<div id="content" class="row ">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $memberName = get_post_meta( $post->ID, '_cmb_member_name', true );?>
			<?php $memberTitle = get_post_meta( $post->ID, '_cmb_member_title', true );?>
			<?php $memberPhoto = get_post_meta( $post->ID, '_cmb_member_photo', true );?>
			<?php $memberDesc = get_post_meta( $post->ID, '_cmb_member_job_description', true );
			?>
					<div id="single-team-intro" class="row padd-row theme_bg_darker">
						<div class="container">
							<div class="single-executive-member">
								<div class="col-md-3">
									<img src="<?php echo $memberPhoto; ?>"/>
								</div>
								<div class="col-md-9">
									<div class="title pink"><?php echo $memberName; ?></div>
									<div class="subtitle"><?php echo $memberTitle; ?></div>
									<div class=""><div class="the-content"><?php echo $memberDesc; ?></div></div>
								</div>
							</div>
						</div>
					</div>

			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	@include('views.wholeTeam')

</div>
<?php get_footer(); ?>