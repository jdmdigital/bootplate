<?php
// Default Navigation Template
// @since Bootplate v0.5

?>
<nav class="navbar navbar-full navbar-dark bg-inverse navbar-inverse hamburger-cross">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggler hidden-sm-up is-closed navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false" aria-controls="primary-menu">
				<span class="sr-only screen-reader-text">Toggle Menu</span>
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
				<li><a href="/search/"><span class="bp-search"></span><span class="hidden-sm-up"><?php _e('Site Search', 'bootplate'); ?></span></a></li>
			</ul>
		</div><!-- /#primary-menu -->
	</div><!--/.container-->
</nav>
