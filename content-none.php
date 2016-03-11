<?php
/*
 * The template part for displaying a message that posts cannot be found
 */
?>
<header class="jumbotron jumbotron-fluid bg-danger">
	<div class="container">
		<h1>Nothing Found.</h1>
		<p>We're sorry, but we can't seem to find that. Details below.</p>
	</div>
</header>
<section class="no-results not-found">
	<div class="container">
		<h2>Error Details</h2>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( 'Ready to publish your first post? <a href="%1$s">Let&rsquo;s do this</a>!', esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
		<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
		<?php get_search_form(); ?>
		<?php else : ?>
		<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
		<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .container -->
</section><!-- .no-results -->