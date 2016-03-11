<?php
/*
 * The template for displaying category pages
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="jumbotron jumbotron-fluid bg-custom">
	<div class="container">
		<h1><?php single_cat_title(); ?></h1>
		<?php if(isset(category_description())) : ?><p><?php echo category_description(); ?></p><?php endif; ?>
	</div><!--/.container-->
</header>

<section>
	<div class="container">
		<div class="row margin-bottom category">
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div>
	</div>
</section>

<?php else : ?>

<?php get_template_part( 'content', 'none' ); ?>

<?php endif; //have posts ?>

<?php get_footer(); ?>
