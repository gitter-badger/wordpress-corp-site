<?php

// Get all posts for strengths post type
$the_query = new WP_Query(array(
	'post_type' => 'case_study'
));

?>

<div id="case-studies" class="case-studies smoothScroll">

<ul class="list">
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php
	$color = get_post_meta( $post->ID,'_cmb_read_more_color', true);
	$percentage_increase = get_post_meta( get_the_id(), 'case_study_info_increase', true );
	$demo_link_hash = array('teal'=>'white', 'gray' => 'pink');
?>
	<li class="list-item padd-row <?php echo $color; ?>">
		<div class="container">
			<div class="image col-md-7">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-md-5">
				<h2 class="super-large-text"><?php echo $percentage_increase ?></h2>
				<div class="desc"><?php the_excerpt();?></div>
				<?php echo get_demo_link($demo_link_hash[$color], get_permalink(),  __('Read Case Study')); ?>

			</div>
		</div>
	</li>
<?php endwhile; ?>
</ul>

</div>
<?php wp_reset_postdata(); ?>