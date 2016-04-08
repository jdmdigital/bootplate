<?php
/*
 * Bootplate Footer Template 
 */
?>

<footer>
	<?php if(get_bootplate_widget_footer_cols() != '') : ?>
	<div id="widget-footer" class="hidden-xs">
		<div class="container">
			<div class="row">
				<?php if(is_active_sidebar('footer-1')) : ?>
				<div class="<?php echo get_bootplate_widget_footer_cols(); ?>">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar('footer-2')) : ?>
				<div class="<?php echo get_bootplate_widget_footer_cols(); ?>">
					<?php dynamic_sidebar('footer-2'); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar('footer-3')) : ?>
				<div class="<?php echo get_bootplate_widget_footer_cols(); ?>">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar('footer-4')) : ?>
				<div class="<?php echo get_bootplate_widget_footer_cols(); ?>">
					<?php dynamic_sidebar('footer-4'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!--/#widget-footer-->
	<?php endif; ?>
	<div id="socket-footer">
		<div class="container">
			<div class="row">
				<div class="<?php if ( has_nav_menu( 'social' ) ||  has_nav_menu( 'footer' )) { echo 'col-sm-4 ';} else {echo 'col-lg-12 text-center ';} ?>col-copyright">
					<p>&copy; <?php echo date('Y'); ?> - <?php echo get_bootplate_formal_name(); ?>.</p>
				</div>
				<?php
				// Social Links Menu
				if ( has_nav_menu( 'social' ) ) {
					echo '<div class="col-sm-8 col-links links-social"><ul class="list-inline">';
					wp_nav_menu( array(
						'menu'              => 'social',
						'theme_location'    => 'social',
						'depth'             => 0,
						'link_before'    => '<span class="sr-only screen-reader-text">',
						'link_after'     => '</span>',
						'container'         => '',
						'menu_class'        => 'list-inline',
						'items_wrap'      => '%3$s',
						'fallback_cb'       => false
					));
					echo '</ul></div>';
				}
				
				// Regular Text Links Menu
				if ( has_nav_menu( 'footer' ) && !has_nav_menu( 'social' ) ) {
					echo '<div class="col-sm-8 col-links links-footer"><ul class="list-inline">';
					wp_nav_menu( array(
						'menu'              => 'footer',
						'theme_location'    => 'footer',
						'depth'             => 0,
						'container'         => '',
						'menu_class'        => '',
						'items_wrap'      => '%3$s',
						'fallback_cb'       => false
					));
					echo '</ul></div>';
				}
				?>
			</div>
		</div>
	</div><!--/#socket-footer-->
	<?php do_action( 'bootplate_credits' ); ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
