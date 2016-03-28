<?php 
/*
Template Name: Search Page
*/
get_header(); 
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<?php while ( have_posts() ) : the_post(); ?>
<header class="<?php echo header_classes(); ?>"<?php the_header_bgimg(get_the_id(), 'full'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php the_title( '<h1 class="display-3">', '</h1>' ); ?>
				<?php if(have_bootplate_subtitle()) { bootplate_subtitle(); } ?>
				<?php get_search_form(); ?>
			</div>
		</div><!--/row-->
	</div><!--/.container-->
</header>

<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
