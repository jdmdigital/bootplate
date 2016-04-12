<?php
/*
 * The main template file
 * Update @v1.3
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<header class="<?php echo header_classes(); ?>">
		<div class="container">
			<?php 
				if(get_option('page_for_posts')) {
					$blog_page_id = get_option('page_for_posts');
					echo '<h1>'.get_page($blog_page_id)->post_title.'</h1>';
				} else {
					the_title( '<h1>', '</h1>' );
				} ?>
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
	

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; // if posts ?>

<?php get_footer(); ?>