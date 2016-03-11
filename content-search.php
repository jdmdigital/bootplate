<?php
/*
 * Template for serp
 */
?>

<article id="page-<?php the_ID(); ?>" class="serp margin-bottom">
	<h2 class="h4 no-margin-bottom"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p><cite><?php the_permalink(); ?></cite> <span class="text-muted resulttype">(<?php result_type(); ?>)</span></p>
	<?php the_excerpt(); ?>
</article>
