<?php

// Get all posts for strengths post type
$the_query = new WP_Query(array(
	'post_type' => 'strength',
	'posts_per_page' => '3'
));
?>
<div id="strengths" class="strengths tabs theme_bg_darker">
	<div class="container">
		<ul class="">
		<?php $post_idx = 1; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php $icon_idle_url = get_post_meta( $post->ID, '_cmb_icon_off', true );?>
			<?php $icon_active_url = get_post_meta( $post->ID, '_cmb_icon_on', true );?>
			<style>
				.strengths .icon-<?php echo $post_idx; ?> {
					background: url('<?php echo $icon_idle_url; ?>') no-repeat;
				}
				.strengths .active .icon-<?php echo $post_idx; ?> {
					background: url('<?php echo $icon_active_url; ?>') no-repeat;
				}
			</style>
			<?php
				$strengthClass = '';
				if ($post_idx === 2)
				{
					$strengthClass = 'active';
				}
			?>
			<li class="item col-md-4 <?php echo $strengthClass; ?>">
				<div class="tip">
					<svg class="" height="20" width="20">
					  <polygon points="0,0 20,0 10,10" style="fill:#ef7c22;" />
					</svg>
				</div>
				<div class="icon icon-<?php echo $post_idx; ?>"></div>
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="desc"><?php the_excerpt();?></div>

			</li>
		<?php $post_idx += 1; ?>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata(); ?>
	<div>
	<?php $post_idx = 1; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php
			$strengthClass = '';
			if ($post_idx === 2)
			{
				$strengthClass = 'active';
			}
		?>
	<div class="theme_bg_light tabs-content <?php echo $strengthClass; ?>">
		<div class="container">
				<div class="col-md-6">
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="text">
						<?php the_content(); ?>
					</div>
					<?php echo get_demo_link('orange', '#',  __('Read more')); ?>

				</div>
				<div class="col-md-6 text-center">
					<?php the_post_thumbnail();?>
				</div>
		</div>
	</div>
	<?php $post_idx += 1; ?>
	<?php endwhile; ?>
	</div>
</div>
