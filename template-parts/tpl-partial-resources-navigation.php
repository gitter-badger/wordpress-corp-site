
<?php $active = isset($active) ? $active: ''; ?>
<ul id="links" class="nav center-block">
	<li class="menu-item <?php echo $active == 'news' ? 'current-menu-item': '' ?>">
		<a href="<?php echo get_post_type_archive_link('news'); ?>" class="smoothScroll">
			<?php _e('News'); ?>
		</a>
	</li>
	<li class="menu-item <?php echo $active == 'case-study' ? 'current-menu-item': '' ?>">
		<a href="<?php echo get_post_type_archive_link('case_study'); ?>" class="smoothScroll">
			<?php _e('Case Studies'); ?>
		</a>
	</li>
	<li class="menu-item <?php echo $active == 'white-paper' ? 'current-menu-item': '' ?>">
		<a href="<?php echo get_post_type_archive_link('white_paper'); ?>" class="smoothScroll">
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