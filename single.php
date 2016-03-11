<?php
/*
 * The template for displaying single posts
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="jumbotron jumbotron-fluid bg-custom">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php if( isset(get_the_excerpt()) ) : ?><p><?php the_excerpt(); ?></p><?php endif; ?>
				<p class="post-meta">By <?php the_author_link(); ?> last updated <a href="<?php echo get_month_link(the_date('Y'), the_date('m')); ?>"><?php the_modified_date(); ?></a> in <?php the_category(', '); ?></p>
			</div><!--/col-->
		</div><!--/row-->
	</div><!--/.container-->
</header>

<section>
	<div class="container">
		<div class="row margin-bottom single-content">
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

<?php else : ?>

<?php get_template_part( 'content', 'none' ); ?>

<?php endif; //have posts ?>

<?php get_footer(); ?>
