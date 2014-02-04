<?php
$differences = get_pages(array(
	'parent' => getPageBySlug('why-convertro')->ID,
	'post_type' => 'page',
	'post_status' => 'publish',
	'hierarchical' => false,
	'sort_column' => 'menu_order',
));
?>
<div id="differences" class="differences padd-row">
	<div class="container">
		<div class="col-md-12">
			<div class="text differences-intro">
				<?php //echo $text; ?>

			</div>

			<div>
			<ul class="">
				@foreach($differences as $difference)
					<li class="list-item row">
						<div class="icon col-md-1 hidden-xs">
							<img src="{{get_post_meta( $difference->ID, '_cmb_icon_off', true )}}"/>
						</div>
						<div class="col-sm-7">
							<h2 class="title">{{$difference->post_title}}</h2>
							<div class="desc">{{get_post_meta( $difference->ID, '_cmb_excerpt', true )}}</div>
						</div>
						<div class="col-sm-3 col-sm-offset-1 align-right">
							{{get_demo_link(get_post_meta( $difference->ID,'_cmb_colors', true), get_permalink($difference->ID),  __('Learn more'))}}

						</div>
					</li>
				@endforeach
			</ul>
			</div>
		</div>
	</div>
</div>
