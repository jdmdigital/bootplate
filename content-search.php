<?php
/*
 * Template for serp
 */
?>

<article id="page-<?php the_ID(); ?>" class="serp">
	<h2 class="h4 no-margin"><a href="<?php echo bootplate_get_post_link(); ?>"><?php the_title(); ?></a></h2>
	<cite><?php echo bootplate_get_post_link(); ?></cite>
	<?php the_excerpt(); ?>
</article>

