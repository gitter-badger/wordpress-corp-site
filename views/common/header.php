<div class="header-area">
	<div class="theme_bg_darker">
		<div class="container">
			@wpposts
		    <div class="intro" style="background-image: url({{ wpMeta($post->ID, 'main_image') }});">
				<div class="text">
					{{ wpMeta($post->ID, 'main_text') }}
				</div>
			</div>
			@wpempty
			@wpend
		</div>
	</div>
</div>