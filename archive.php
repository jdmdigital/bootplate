<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="jumbotron jumbotron-fluid bg-custom">
	<div class="container">
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
		<?php the_archive_description( '<p>', '</p>' ); ?>
	</div><!--/.container-->
</header>

<section>
	<div class="container">
		<div class="row margin-bottom archive">
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div>
	</div>
</section>

<?php else : ?>

<?php get_template_part( 'content', 'none' ); ?>

<?php endif; //have posts ?>

<?php get_footer(); ?>
