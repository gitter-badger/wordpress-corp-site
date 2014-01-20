<?php

// Get all posts for strengths post type
$the_query = new WP_Query(array(
	'post_type' => 'data_sheets',
	'posts_per_page' => '3'
));
?>
<div id="why-convertro" class="data-sheets tabs theme_bg_darker section">
	<div class="section-title">
			<div class="container">
				<h2 class="title col-md-9"><?php _e('Why Convertro'); ?></h2>
				<div class="col-md-3 text-right">
				</div>
			</div>
		</div>

	<div class="container">

		<ul class="">
		<?php $featuredDatasheets = array(); ?>
		<?php $post_idx = 1; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php $icon_idle_url = get_post_meta( $post->ID, '_cmb_icon_off', true );?>
			<?php $icon_active_url = get_post_meta( $post->ID, '_cmb_icon_on', true );?>
			<?php array_push($featuredDatasheets, $post->ID);?>
			<style>
				.data-sheets .icon-<?php echo $post_idx; ?> {
					background: url('<?php echo $icon_idle_url; ?>') no-repeat;
				}
				.data-sheets .active .icon-<?php echo $post_idx; ?> {
					background: url('<?php echo $icon_active_url; ?>') no-repeat;
				}
			</style>
			<?php
				$dataSheetsClass = '';
				if ($post_idx === 2)
				{
					$dataSheetsClass = 'active';
				}
			?>
			<li class="item col-md-4 <?php echo $dataSheetsClass; ?>">
				<div class="tip">
					<svg class="" height="20" width="20">
					  <polygon points="0,0 20,0 10,10" style="fill:#EE576B;" />
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
			$dataSheetsClass = '';
			if ($post_idx === 2)
			{
				$dataSheetsClass = 'active';
			}
		?>
	<div class="theme_bg_light tabs-content <?php echo $dataSheetsClass; ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="text">
						<?php  global $more; $more = 0; the_content(); ?>
					</div>
					<?php echo get_demo_link('pink', get_permalink(),  __('Read more')); ?>
				</div>
			</div>
		</div>
	</div>
	<?php $post_idx += 1; ?>
	<?php endwhile; ?>
	</div>
</div>


<?php
$q = new WP_Query(array(
	'post_type' => 'data_sheets',
	'posts_per_page' => '3',
	'post__not_in' => $featuredDatasheets
));
?>
<?php if ( $q->have_posts() ) : ?>
<div id="data-sheets" class="theme_bg_white section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-9"><?php _e('More Data Sheets'); ?></h2>
			<div class="col-md-3 text-right">
				<?php echo get_demo_link('orange', site_url('/resources/data-sheets'), __('See all data sheets')); ?>

			</div>
		</div>
	</div>
	<div class="container">


		<ul class="data-sheets-list">

			<?php while ( $q->have_posts() ) : $q->the_post(); $postId = $post->ID ?>
			<?php $cssClass = get_post_meta( $post->ID, '_cmb_read_more_color', true ); ?>
				<li class="item col-md-4 hover-<?php echo $cssClass; ?>">
					<div class="">
						<div class="">
							<a class="icon bg-<?php echo $cssClass; ?>" href="<?php the_permalink();?>"></a>
						</div>
						<a href="<?php the_permalink();?>"><h2 class="title"><?php the_title(); ?></h2></a>
						<?php the_excerpt();?>
					</div>
				</li>
			<?php endwhile; ?>

		</ul>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<?php endif; ?>
