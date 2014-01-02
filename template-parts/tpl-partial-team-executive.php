<?php $globalPostId = $post->ID;?>
<div id="team" class="row theme_bg_white section">
	<div class="container">
		<h2 class="title col-md-12"><?php _e('Executive Team'); ?></h2>
		<?php
			$q = new WP_Query(array(
				'post_type' => 'team_member',
				'posts_per_page' => '4',
				'meta_key' => '_cmb_member_group',
				'meta_value' => 'executive',
			));
		?>
		<?php if ( $q->have_posts() ) : ?>
			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php $memberName = get_post_meta( $postId, '_cmb_member_name', true );?>
			<?php $memberTitle = get_post_meta( $postId, '_cmb_member_title', true );?>
			<?php $memberPhoto = get_post_meta( $postId, '_cmb_member_photo', true );?>
			<?php $memberDesc = get_post_meta( $postId, '_cmb_member_job_description', true );?>
			<?php $selectedClass = $globalPostId == $postId ? 'selected-member' : ''; ?>
				<a href="<?php the_permalink(); ?>" class="executive-member-link member-link col-md-3 <?php echo $selectedClass;?>">
					<img src="<?php echo $memberPhoto; ?>"/>
					<div class="text"><?php echo $memberName; ?></div>
					<div class="text"><?php echo $memberTitle; ?></div>
				</a>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</div>