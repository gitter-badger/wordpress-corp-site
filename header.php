<html <?php language_attributes( 'html' ) ?>>
<head>
	<title><?php wp_title(); ?></title>
	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- WordPress -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Unica+One|Didact+Gothic' rel='stylesheet' type='text/css'>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ); ?>
	<?php wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' ); ?>
	<?php wp_enqueue_style('convertro-style', get_bloginfo( 'stylesheet_url' ));?>
	<?php if (is_404()) {
		wp_enqueue_style( '404', get_template_directory_uri() . '/css/404.css' );
	} ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php echo get_option('cvo_notifications_google_container_script','');?>
	<div class="container-fluid">
	<div id="header">
		<div class="container">
			<div class="row padd-row">
				<h1 id='logo' class="col-sm-3">
					<a href="<?php echo home_url(); ?>"></a>
				</h1>
				<div class="col-md-9 align-right">
					<ul class="nav">
					<?php
					if ( has_nav_menu( 'header_menu' ) )
					{
					     wp_nav_menu( array(
							'menu' => 'header_menu',
							'depth' => '1',
							'menu_class' => 'nav',
							'items_wrap' => '<li id="%1$s" class="%2$s">%3$s</li>',
							'container' => ''
						));

					}
					?>
<?php if (isset($_SESSION['request-demos'])
		&& in_array('top-navigation-request-demo', $_SESSION['request-demos'])):?>
						<span class="thank-you-message">
							<i class="fa fa-check"></i>
							<span class="dimmed" style="font-size: 12px;">Thank you!</span>
						</span>
					<?php else:?>
					<?php echo get_demo_link('gray'. ' request-form', '#', __('Request a demo'), array('data-context'=>'request-demo', 'data-item-id'=>'top-navigation-request-demo')); ?>
					<?php endif; ?>


					</ul>
				</div>
			</div>
		</div>


	</div><!--end header-->
	<div>
