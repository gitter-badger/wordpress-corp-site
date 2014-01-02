<?php

// Get all posts for strengths post type
$the_query = new WP_Query(array(
	'post_type' => 'case_study'
));

?>

<div id="case-studies" class="case-studies row smoothScroll">

<ul class="list">
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php $Color = get_post_meta( $post->ID,'_cmb_read_more_color', true); ?>
	<li class="list-item row <?php echo $Color; ?>">
		<div class="container">
			<div class="image col-md-7">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-md-5">
				<h2 class="super-large-text"><?php echo get_post_meta( get_the_id(), 'case_study_info_increase', true ); ?></h2>
				<div class="desc"><?php the_excerpt();?></div>
				<a class="demo-link" href="<?php echo get_permalink(); ?>">Read Case Study
					<svg class="tip" height="26" width="14">
                		<polygon points="0,27 0,27 0,0 0,0 10.084,13.213"/>
            		</svg>
				</a>
			</div>
		</div>
	</li>
<?php endwhile; ?>
</ul>

</div>
<?php wp_reset_postdata(); ?>