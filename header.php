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
	
	<!-- Bootplate v<?php echo bootplate_info('version'); ?> -->
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php bootplate_meta(); ?>
	
		<?php wp_head(); ?>
	
	<?php bootplate_async_css(); ?>
</head>

<body <?php body_class(); ?>>
<!-- <?php echo get_bootplate_nav_type(); ?> -->
<?php get_template_part('nav', get_bootplate_nav_type()); ?>
<a class="skip-link sr-only screen-reader-text" href="#content"><?php _e('Skip to content', 'bootplate'); ?></a>
