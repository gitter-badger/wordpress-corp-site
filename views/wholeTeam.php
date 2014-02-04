<?php $args['themeBgClass'] =  (isset($args['themeBgClass']))? $args['themeBgClass']: 'theme_bg_lighter'; ?>
<div id="team" class="{{ $args['themeBgClass'] }} section">

	<div class="section-title">
		<div class="container">
			<h2 class="title col-md-8">{{ _e('Team') }}
			</h2>
			<span class="join-us text-right col-md-4">
				<span class="title">{{ _e('Join our team?') }}</span>
				<span class="">
					{{ get_demo_link('pink', site_url('/about/careers'),  __('Careers')) }}
				</span>
			</span>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="row">
				{{ getPostByParentTerm('left-column', false) }}
				{{ getPostByParentTerm('right-column', false) }}
			</div>
		</div>
	</div>
</div>