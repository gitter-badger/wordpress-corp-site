<html <?php language_attributes( 'html' ) ?>>
<head>
	<title><?php wp_title(); ?></title>
	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!-- WordPress -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Unica+One|Didact+Gothic' rel='stylesheet' type='text/css'>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_enqueue_style( 'extra-icons', get_template_directory_uri() . '/css/font-awesome.min.css' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container-fluid">
	<div id="header">
		<div class="container">
			<div class="row padd-row">
				<h1 id='logo' class="col-md-3">
					<a href="<?php echo home_url(); ?>"></a>
				</h1>
				<div class="col-md-9 align-right">
					<?php
					if ( has_nav_menu( 'header_menu' ) )
					{
					     wp_nav_menu( array(
							'menu' => 'header_menu',
							'depth' => '1',
							'menu_class' => 'nav'
						));
					}
					?>
				</div>
			</div>
		</div>


	</div><!--end header-->
	<div>
