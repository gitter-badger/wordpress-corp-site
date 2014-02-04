<?php

// Get all posts for strengths post type
$the_query = new WP_Query(array(
	'post_type' => 'strength',
	'posts_per_page' => '3'
));
?>
<div id="strengths" class="strengths tabs theme_bg_darker">
	<div class="container">
		<?php $post_idx = 1; ?>
		@while ( $the_query->have_posts() )
			<?php $the_query->the_post(); ?>
			<style>
				.strengths .icon-{{ $post_idx }} {
					background: url('{{ $icon_idle_url }}') no-repeat;
				}
				.strengths .active .icon-{{ $post_idx }} {
					background: url('{{ $icon_active_url }}') no-repeat;
				}
			</style>

			<?php
			if ($post_idx === 2){
				 $strengthClass = 'active';
			}else{
				 $strengthClass = '';
			}
			?>

			<li class="item col-xs-4 {{ $strengthClass }}">

				<div class="tip">
					<svg class="" height="20" width="20">
					  <polygon points="0,0 20,0 10,10" style="fill:#ef7c22;" />
					</svg>
				</div>
				<div class="icon icon-{{ $post_idx }}"></div>
				<h2 class="title">{{ the_title() }}</h2>
				<div class="desc hidden-xs">{{ the_excerpt() }}</div>

			</li>
			<?php $post_idx += 1; ?>
		@endwhile
		</ul>
	</div>
	<?php wp_reset_postdata(); ?>

	<div>
	<?php $post_idx = 1; ?>
	@while ( $the_query->have_posts() )
		<?php global $more; $more = 0; ?>
		<?php
			$the_query->the_post();
			$strengthClass = '';
			if ($post_idx === 2)
			{
				$strengthClass = 'active';
			}
		?>
	<div class="theme_bg_light tabs-content <?php echo $strengthClass; ?>">
		<div class="container">
				<div class="col-md-6">
					<h2 class="title"></h2>
					<div class="text">
						{{ get_the_content_with_formatting(get_the_content()) }}
					</div>
					<?php echo get_demo_link('orange', get_permalink( ),  __('Read more')); ?>

				</div>
				<div class="col-md-6 text-center hidden-xs">
					<div class="display-table">
						<div class="display-cell">
							<?php the_post_thumbnail();?>
						</div>
					</div>

				</div>
		</div>
	</div>
	<?php $post_idx += 1; ?>
	@endwhile
	</div>
</div>
