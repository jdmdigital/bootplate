<?php
/*
 * The template for displaying search results pages.
 */
global $wp_query;
get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="jumbotron jumbotron-fluid bg-custom">
	<div class="container">
		<h1>Search Results</h1>
		<p><?php echo '<b>'.$wp_query->found_posts.' results</b> found searching for: <b>'.get_search_query().'</b>'; ?></p>
		<?php get_search_form(); ?>
	</div><!--/.container-->
</header>
<section class="bg-default">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-6">
				<?php 
				while ( have_posts() ) : the_post(); 
				
					get_template_part( 'content', 'search' );
		
				endwhile;
				?>
			</div>
		</div>
	</div>
</section>

<?php else : ?>
	<?php
		// None Found
		get_template_part( 'content', 'none' );
	?>
<?php endif; ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
