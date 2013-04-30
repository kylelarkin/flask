<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
	
	<?php wp_head(); ?>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/screen.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="<?php bloginfo( 'template_directory' ); ?>/js/respond.min.js"></script>
		<script src="<?php bloginfo( 'template_directory' ); ?>/js/ie-min.js"></script>
		<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	
</head>

<body <?php body_class( flask_page_name() ); ?>>
	<header role="banner">
		<nav role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-header-menu', 'container' => false) ); ?>
		</nav>
	</header>
	<div class="wrapper">