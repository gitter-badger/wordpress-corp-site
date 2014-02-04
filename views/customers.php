<?php $q = new WP_Query(array('post_type' => 'client', 'posts_per_page' => '100')); ?>
<div id="customers" class="theme_bg_dark section">
	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-12">{{ _e('Notable Customers') }}</h2>
		</div>
	</div>
	<div class="container">


		<div class="row padd-row">
			<ul class="customers-list">
			@if ( $q->have_posts() )
				<?php $index = 1; ?>
				<?php $ITEMS_IN_LINE = 5; ?>
				@while ( $q->have_posts() )
					<?php $q->the_post(); $postId = $post->ID ?>
					<?php
						$isNewLine = ($index % $ITEMS_IN_LINE == 0);
						$caseStudyURL = get_post_meta( $post->ID, '_cmb_case_study_url', true );
						$readMoreClass = get_post_meta( $post->ID, '_cmb_read_more_color', true );
					?>
						<li class="item col-md-3 customer-logo">
								<div class="customer-logo-container">
									<img src="{{ get_post_meta( $post->ID, '_cmb_client_logo', true ) }}"/>
								</div>
								@if(!empty($caseStudyURL))
									{{ get_demo_link($readMoreClass, $caseStudyURL,  __('Read Case Study')) }}
								@endif
						</li>
					<?php $index += 1; ?>
				@endwhile
			@endif
			</ul>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</div>