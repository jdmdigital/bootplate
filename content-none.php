<?php
/*
 * The template part for displaying a message that posts cannot be found
 */
?>
<header class="jumbotron jumbotron-fluid bg-danger">
	<div class="container">
		<h1><?php _e('Dang Nabbit!', 'bootplate'); ?></h1>
		<p><?php _e('We&rsquo;re sorry, but that didn&rsquo;t work. Details below.', 'bootplate'); ?></p>
		<?php get_search_form(); ?>
	</div>
</header>
<section class="no-results not-found">
	<div class="container" style="min-height:500px;">
		<?php bootplate_breadcrumbs(); ?>
		<h2>Error Details</h2>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( 'Ready to publish your first post? <a href="%1$s">Let&rsquo;s do this</a>!', esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
		<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bootplate'); ?></p>
		<?php else : ?>
		<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching would help.', 'bootplate'); ?></p>
		<?php endif; ?>
	</div><!-- .container -->
</section><!-- .no-results -->