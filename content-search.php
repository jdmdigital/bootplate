<?php
/*
 * Template for serp
 */
?>

<article id="page-<?php the_ID(); ?>" class="serp">
	<h2 class="h4 no-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<cite><?php the_permalink(); ?></cite>
	<?php the_excerpt(); ?>
</article>

