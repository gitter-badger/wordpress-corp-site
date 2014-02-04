<?php
/*
Template Name: White paper
*/
get_header();
?>
	@include('views.common.header')

	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<?php $active = 'white-paper'; ?>
				@include('views.common.resourcesNavigation')
			</div>
		</div>
	</div>

	<?php
		$cssClasses = array('pink', 'orange', 'yellow', 'teal');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$postsPerPage = 10;
		$q = new WP_Query(array(
			'post_type' => 'white_paper',
			'posts_per_page' => $postsPerPage,
			'paged'=>$paged,
		));
	?>

	<?php
		breadcrumbs(array(
			'theme' => 'theme_bg_dark',
			'trail' => array(
				array('url' => site_url('/'), 'title' => __('Home')),
				array('url' => site_url('/resources'), 'title' => __('Resources'))
			),
			'child' => __('White Papers')
		));
	?>

	<div class="white-papers-list section">
		<div class="theme_bg_light">
			<div class="section-title">
				<div class="container">
					<h2 class="title col-md-9">{{ _e('White Papers') }}</h2>
					<div class="col-md-3 text-right"></div>
				</div>
			</div>
		</div>
		<div class="theme_bg_light">
			<div class="container">
			@if ( $q->have_posts() )
					<ul>
						<?php $index = 4; ?>
						@while ( $q->have_posts() )
							<?php $q->the_post(); ?>
							<?php $cssClassIndex = $index % 4; ?>
							<li class="padd-row clearfix">
									<div class="col-md-2">
										<div class="logo">
											<div class="centerize">
												<i class="icon fa-3x fa fa-file-text"></i>
											</div>
										</div>
									</div>

									<div class="col-md-10 {{ $cssClasses[$cssClassIndex] }}">
										<h4 class="title">{{ the_title() }}</h4>
										<div class="answer">{{ the_content() }}</div>
									 	@if (isset($_SESSION['white-papers']) && in_array($post->ID, $_SESSION['white-papers']))
											<span class="thank-you-message">
												<i class="fa fa-check"></i>
												{{ _e('Your request has been accepted. Thank you!') }}
												<a href="#" class="edit-form" data-context="<?php echo $post->ID; ?>">{{ _e('Edit') }}</a>
											</span>
										@else
											{{ get_demo_link($cssClasses[$cssClassIndex]. ' request-form', get_permalink(), __('Request'), array('data-context'=> 'white-paper', 'data-item-id'=>$post->ID)) }}
										@endif
									</div>
							</li>
							<li class="col-md-12 seperator-horizontal"></li>
							<?php $index += 1; ?>
						@endwhile
					</ul>
				<?php endif; ?>
			</div>
			</div>
			<div class="section-read-more">
				<div class="container">
					<div class="pagination center-block">
					 {{ get_pagination($q, 'white-paper') }}
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>