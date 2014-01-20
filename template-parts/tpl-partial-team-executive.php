<?php $globalPostId = $post->ID;?>
<div id="team" class="theme_bg_white section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12"><?php _e('Executive Team'); ?></h2>
		</div>
	</div>
	<div class="container">

		<?php
			$q = new WP_Query(array(
				'post_type' => 'team_member',
				'posts_per_page' => '8',
				'meta_key' => '_cmb_member_group',
				'meta_value' => 'executive',
			));
		?>
		<div class="row executive-team-list">
			<div class="col-md-12">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
				<?php $memberName = get_post_meta( $postId, '_cmb_member_name', true );?>
				<?php $memberTitle = get_post_meta( $postId, '_cmb_member_title', true );?>
				<?php $memberPhoto = get_post_meta( $postId, '_cmb_member_photo', true );?>
				<?php $memberDesc = get_post_meta( $postId, '_cmb_member_job_description', true );?>
				<?php $selectedClass = $globalPostId == $postId ? 'selected' : ''; ?>
					<a href="<?php the_permalink(); ?>" class="col-md-3 executive-member-link grayscalize <?php echo $selectedClass;?>">
						<div class="image">
							<img src="<?php echo $memberPhoto; ?>"/>
						</div>
						<div class="title"><?php echo $memberName; ?></div>
						<div class="subtitle"><?php echo $memberTitle; ?></div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>

	</div>
</div>