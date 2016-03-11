<?php
/*
 * The main template file
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php 
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
	?>

<?php else : ?>

	<?php 
		// No Posts Found
		get_template_part( 'content', 'none' ); 
	?>

<?php endif; // if posts ?>

<?php get_footer(); ?>