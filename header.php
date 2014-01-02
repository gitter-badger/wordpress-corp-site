<html <?php language_attributes( 'html' ) ?>>
<head>
	<title><?php wp_title(); ?></title>
	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!-- WordPress -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container-fluid">
	<div id="header" class="row">
		<div class="container">
			<div class="row">
				<h1 id='logo' class="col-md-3">
					<a href="<?php echo home_url(); ?>"></a>
				</h1>
				<div class="col-md-9 align-right">
					<?php wp_nav_menu( array(
						'menu' => 'Header → Main menu',
						'depth' => '1',
						'menu_class' => 'nav'
					)); ?>
				</div>
			</div>
		</div>


	</div><!--end header-->
	<div class="container-fluid">
