<?php
/*
Template Name: About
*/
get_header(); ?>
	<div id="content" class="about-page">
		@include('views.common.header')

		@if ( have_posts() )
			@while ( have_posts() )
				<?php
					the_post();
					$postId = $post->ID;
					$mainImageUrl = get_post_meta( $postId, '_cmb_main_image', true );
					$mainImageText = get_post_meta( $postId, '_cmb_main_text', true );
					$storyImage = get_post_meta( $postId, '_cmb_story_thumb', true );
					$storyText = get_post_meta( $postId, '_cmb_story_text', true );
					$citation = get_post_meta( $postId, '_cmb_story_citation', true );
				?>

			<div class="sub-navigation">
				<div class="container">
					<ul id="links" class="nav center-block">
						<li class="col-xs-3 menu-item"><a href="#team" class="smoothScroll">{{ _e('Team') }}</a></li>
						<li class="col-xs-3 menu-item"><a href="#customers" class="smoothScroll">{{ _e('Customers') }}</a></li>
						<li class="col-xs-3 menu-item"><a href="#partners" class="smoothScroll">{{ _e('Partners') }}</a></li>
						<li class="col-xs-3 menu-item"><a href="{{ site_url('/about/careers') }}" class="smoothScroll">{{ _e('Careers') }}</a></li>
					</ul>
				</div>
			</div>
			<?php
				breadcrumbs(array(
					'theme' => 'theme_bg_dark',
					'trail' => array(
						array('url' => site_url('/'), 'title' => __('Home')),
					),
					'child' => __('About')
				));
			?>
			<div class="theme_bg_light section story-section">
				<div class="container">
					<div class="col-md-6">
						<div class="citation">
							<div class="single-executive-member image"><img src="{{ $storyImage }}"/></div>
							<div class="text">{{ $citation }}</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="the-content">{{ $storyText }}</div>
					</div>
				</div>
			</div>
		 @endwhile
		@endif

		@include('views.executiveTeam')
		@include('views.advisorsTeam')
		@include('views.convertroTeam')
		@include('views.customers')
		@include('views.partners')
	</div>
<?php get_footer(); ?>