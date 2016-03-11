<?php
/*
 * Bootplate Header Template 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
	<link rel="preload" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/body.css" as="style" onload="this.rel='stylesheet'" type="text/css" />
	<noscript><link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/body.css" type="text/css" /></noscript>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/loadcss.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-full navbar-dark bg-inverse navbar-inverse hamburger-cross">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggler hidden-sm-up is-closed navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false" aria-controls="primary-menu">
				<span class="sr-only">Toggle Menu</span>
				<span class="hamb-top"></span>
				<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
			</button>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>
		<div id="primary-menu" class="collapse navbar-collapse pull-sm-right navbar-toggleable-xs">
			<ul class="nav navbar-nav navbar-right">
				<?php
				wp_nav_menu( 
					array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => false,
						'menu_class'      => false,
						'items_wrap'      => '%3$s',
						//'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker()
					)
				);
				?>
				<li><a href="/search/"><span class="bp-search"></span><span class="sr-only">Site Search</span></a></li>
			</ul>
		</div><!-- /#primary-menu -->
	</div><!--/.container-->
</nav>
<a class="skip-link sr-only" href="#content">Skip to content</a>
