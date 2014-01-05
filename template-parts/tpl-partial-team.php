<?php $args['themeBgClass'] =  (isset($args['themeBgClass']))? $args['themeBgClass']: 'theme_bg_lighter'; ?>
<div id="team" class="row <?php echo $args['themeBgClass']; ?> section">
	<div class="container">
		<div class="row">
		<h2 class="title col-md-12"><?php _e('Team'); ?></h2>
		<?php
			$q = new WP_Query(array(
				'post_type' => 'team_member',
				'posts_per_page' => '300',
				'meta_key' => '_cmb_member_group',
				'meta_value' => 'member',
			));
		?>
		<?php if ( $q->have_posts() ) : ?>
			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php $memberName = get_post_meta( $post->ID, '_cmb_member_name', true );?>
			<?php $memberTitle = get_post_meta( $post->ID, '_cmb_member_title', true );?>
			<?php $memberPhoto = get_post_meta( $post->ID, '_cmb_member_photo', true );?>
			<?php $memberDesc = get_post_meta( $post->ID, '_cmb_member_job_description', true );?>
				<a href="<?php the_permalink(); ?>" class="member-photo col-md-1">
					<img src="<?php echo $memberPhoto; ?>"/>
				</a>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
		<div class="row">
			<div class="join-us col-md-12">
				<h3><?php _e('Interested in joining our team?'); ?></h3>
				<?php echo get_demo_link('pink', '#',  __('Careers')); ?>

			</div>
		<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>