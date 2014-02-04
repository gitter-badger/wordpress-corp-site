<?php
/*
Template Name: Resources
*/
get_header();
?>
	<div id="content">
		@include('views.common.header')

		<div class="sub-navigation">
			<div class="container">
				<ul id="links" class="nav center-block">
					<li class="menu-item">
						<a href="#news" class="smoothScroll">
							<?php _e('News'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#case-studies" class="smoothScroll">
							<?php _e('Case Studies'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#white-papers" class="smoothScroll">
							<?php _e('White Papers'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#faq" class="smoothScroll">
							<?php _e('Faq'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#blog-posts" class="smoothScroll">
							<?php _e('Blog'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#featured-videos" class="smoothScroll">
							<?php _e('Videos'); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="news" class="theme_bg_darker section">
			<?php $link = get_demo_link('dark-gray', site_url('/resources/events'),  __('News Archive'));?>
			{{ getSectionTitle(__('Latest News')) }}
			@include('views.simplified.news')
			{{ getSectionFooter($link) }}
		</div>

		<div id="case-studies" class="theme_bg_light section case-studies-resources">
			<?php $link = get_demo_link('gray', site_url('/resources/case-studies'),  __('See all case studies'));?>
			{{ getSectionTitle(__('Latest Case Studies')) }}
			@include('views.simplified.caseStudies')
			{{ getSectionFooter($link) }}
		</div>

		<div id="white-papers" class="theme_bg_white section">
			<?php $link = get_demo_link('white', site_url('/resources/white-paper'),  __('See all white papers'));?>
			{{ getSectionTitle(__('Latest White Papers')) }}
			@include('views.simplified.whitePapers')
			{{ getSectionFooter($link) }}
		</div>

		<div id="faq" class="theme_bg_dark section">
			<?php $link = get_demo_link('gray', site_url('/resources/faq'),  __('Read all questions'));?>
			{{ getSectionTitle(__('Latest Faq')) }}
			@include('views.simplified.faq')
			{{ getSectionFooter($link) }}
		</div>

		<div id="blog-posts" class="theme_bg_darker section">
			<?php $link = get_demo_link('dark-gray', site_url('/resources/blog'),  __('See all blog posts'));?>
			{{ getSectionTitle(__('Latest Blog Posts')) }}
			@include('views.simplified.posts')
			{{ getSectionFooter($link) }}
		</div>

		<div id="featured-videos" class="theme_bg_white section">
			<?php $link = get_demo_link('white', get_post_type_archive_link('video'),  __('Watch all videos'));?>
			{{ getSectionTitle(__('Latest Videos')) }}
			@include('views.simplified.featuredVideos')
			{{ getSectionFooter($link) }}
		</div>
	</div>
<?php get_footer(); ?>











