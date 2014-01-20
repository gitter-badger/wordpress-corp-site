<?php
/*
Template Name: Data Sheets
*/
get_header();
?>

	<?php include(locate_template('template-parts/common/tpl-partial-header.php')); ?>
	<div class="sub-navigation">
		<div class="container">
			<div class="col-md-12">
				<ul id="links" class="nav center-block">
					<li class="menu-item">
						<a href="#why-convertro" class="smoothScroll">
							<?php _e('Why Convertro'); ?>
						</a>
					</li>
					<li class="menu-item">
						<a href="#data-sheets" class="smoothScroll">
							<?php _e('Data Sheets'); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php include(locate_template('template-parts/tpl-partial-featured-data-sheets.php')); ?>

<?php get_footer(); ?>