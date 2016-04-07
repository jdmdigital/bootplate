<?php
/*
 * The main template file
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post() ; ?>
	<header class="<?php echo header_classes(); ?>">
		<div class="container">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php if(have_bootplate_subtitle()) { bootplate_subtitle(); } ?>
		</div><!--/.container-->
	</header>
	<section>
		<div class="container">
			<div class="row">
				<?php get_template_part( 'content', get_post_format() ); ?>
			</div>
		</div>
	</section>
	<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; // if posts ?>

<?php get_footer(); ?>