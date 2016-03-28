<?php
/*
 * The template for displaying single posts
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<header class="<?php echo header_classes(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php the_title( '<h1 class="h2">', '</h1>' ); ?>
				<!--<?php if( get_the_excerpt() != '' ) : ?><p><?php the_excerpt(); ?></p><?php endif; ?>-->
				<p class="post-meta">By <?php the_author_posts_link(); ?> last updated <a href="<?php echo get_month_link(the_date('Y'), the_date('m')); ?>"><?php the_modified_date(); ?></a> in <?php the_category(', '); ?></p>
			</div><!--/col-->
		</div><!--/row-->
	</div><!--/.container-->
</header>

<section>
	<div class="container">
		<div class="row single-content">
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div>
		
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
		
	</div>
</section>
<?php endwhile; ?>

<?php else : ?>

<?php get_template_part( 'content', 'none' ); ?>

<?php endif; //have posts ?>

<?php get_footer(); ?>
