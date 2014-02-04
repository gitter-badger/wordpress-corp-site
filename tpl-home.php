<?php
/*
Template Name: Home page
Description: A Page Template for the front page.
*/
?>
{{get_header()}}
	<div id="content" class="theme_bg_lighter">
		 @if ( have_posts() )`
			@while ( have_posts() )
			{{the_post()}}
				<div id="hp-intro" class= "padd-row">
					<div class="container">
						<div class="row">
							<div class="hp-intro-table">
								<div class="">
									<div class="col-sm-5">
										<div class="text">
											<div class="content">{{ the_content() }}</div>
											@if (isset($_SESSION['request-demos']) && (count($_SESSION['request-demos']) > 0))
												<span class="thank-you-message">
													<i class="fa fa-check"></i>
													Your request has been accepted. Thank you!
													<a href="#" class="edit-form" data-context="request-demo">Edit</a>
												</span>
											@else
											{{get_demo_link('pink'. ' request-form', '#', __('Request a demo'), array('data-context'=>'request-demo', 'data-item-id'=>'hp-intro-request-demo'))}}
											@endif
										</div>
									</div>
									<div class="col-sm-7 col-sm-push-1 video">
										<?php $text = get_post_meta( $post->ID, '_cmb_hp_video_embed', true ); ?>
										{{wp_oembed_get($text, array('width' => '500'))}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endwhile
		@endif
		<div class="sub-navigation">
			<div class="container">
				<ul id="links" class="nav center-block">
					<li class="menu-item">
						<a href="#strengths" class="smoothScroll">{{ _e('How it works') }}</a>
					</li>
					<li class="menu-item">
						<a href="#differences" class="smoothScroll">{{ _e('Our advantage') }}</a>
					</li>
					<li class="menu-item">
						<a href="#case-studies" class="smoothScroll">{{ _e('Case Studies') }}</a>
					</li>
				</ul>
			</div>
		</div>

		@include('views.strengths')
		@include('views.differences')
		@include('views.caseStudies')
	</div>
{{get_footer()}}