
<?php $active = isset($active) ? $active: ''; ?>
<ul id="links" class="nav center-block">
	<li class="menu-item {{ $active == 'news' ? 'current-menu-item': '' }}">
		<a href="{{ site_url('/resources/events') }}" class="smoothScroll">
			{{ __('News') }}
		</a>
	</li>
	<li class="menu-item {{ $active == 'case-study' ? 'current-menu-item': '' }}">
		<a href="{{ site_url('/resources/case-studies') }}" class="smoothScroll">
			{{ __('Case Studies') }}
		</a>
	</li>
	<li class="menu-item {{ $active == 'white-paper' ? 'current-menu-item': '' }}">
		<a href="{{ site_url('/resources/white-paper') }}" class="smoothScroll">
			{{ __('White Papers') }}
		</a>
	</li>
	<li class="menu-item {{ $active == 'faq' ? 'current-menu-item': '' }}">
		<a href="{{ site_url('/resources/faq') }}">
			{{ __('Faq') }}
		</a>
	</li>
	<li class="menu-item {{ $active == 'blog' ? 'current-menu-item': '' }}">
		<a href="{{ site_url('/resources/blog') }}">
			{{ __('Blog') }}
		</a>
	</li>
	<li class="menu-item {{ $active == 'video' ? 'current-menu-item': '' }}">
		<a href="{{ get_post_type_archive_link('video') }}">
			{{ __('Videos') }}
		</a>
	</li>
</ul>