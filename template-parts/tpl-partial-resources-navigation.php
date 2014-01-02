
<?php $active = isset($active) ? $active: ''; ?>
<ul id="links" class="nav center-block">
	<li class="menu-item">
		<a href="<?php echo site_url('/resources#news');?>" class="smoothScroll">
			<?php _e('News'); ?>
		</a>
	</li>
	<li class="menu-item">
		<a href="<?php echo site_url('/resources#case-studies');?>" class="smoothScroll">
			<?php _e('Case Studies'); ?>
		</a>
	</li>
	<li class="menu-item">
		<a href="<?php echo site_url('/resources#white-papers');?>" class="smoothScroll">
			<?php _e('White Papers'); ?>
		</a>
	</li>
	<li class="menu-item <?php echo $active == 'faq' ? 'current-menu-item': '' ?>">
		<a href="<?php echo get_post_type_archive_link('faq'); ?>">
			<?php _e('Faq'); ?>
		</a>
	</li>
	<li class="menu-item <?php echo $active == 'blog' ? 'current-menu-item': '' ?>">
		<a href="<?php echo site_url('/resources/blog');?>">
			<?php _e('Blog'); ?>
		</a>
	</li>
	<li class="menu-item <?php echo $active == 'video' ? 'current-menu-item': '' ?>">
		<a href="<?php echo get_post_type_archive_link('video'); ?>">
			<?php _e('Videos'); ?>
		</a>
	</li>
</ul>