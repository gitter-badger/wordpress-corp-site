<?php $args['themeBgClass'] =  (isset($args['themeBgClass']))? $args['themeBgClass']: 'theme_bg_lighter'; ?>

<div id="team" class="<?php echo $args['themeBgClass']; ?> section">

	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12"><?php _e('Team'); ?></h2>
		</div>
	</div>

	<div class="container">

			<?php
				$q = new WP_Query(array(
					'post_type' => 'team_member',
					'posts_per_page' => '300',
					'meta_key' => '_cmb_member_group',
					'meta_value' => 'member',
				));
			?>
			<div class="row">
				<?php if ( $q->have_posts() ) : ?>
					<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
					<?php $memberName = get_post_meta( $post->ID, '_cmb_member_name', true );?>
					<?php $memberTitle = get_post_meta( $post->ID, '_cmb_member_title', true );?>
					<?php $memberPhoto = get_post_meta( $post->ID, '_cmb_member_photo', true );?>
					<?php $memberDesc = get_post_meta( $post->ID, '_cmb_member_job_description', true );?>
						<a href="<?php the_permalink(); ?>" class="member-photo grayscalize col-md-1">
							<img src="<?php echo $memberPhoto; ?>"/>
						</a>
					<?php endwhile; ?>
				<?php endif; ?>
				<span class="join-us">
				<span class="title"><?php _e('Interested in joining our team?'); ?></span>
					<span class="">
						<?php echo get_demo_link('pink', site_url('/about/careers'),  __('Careers')); ?>
					</span>
			</span>
			</div>

		</div>

</div>