<?php
/*
 * The template for displaying search results pages.
 */
global $wp_query;
get_header(); ?>

<header class="<?php echo header_classes(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-8">
				<h1 class="h2"><?php _e('Search Results', 'bootplate'); ?></h1>
				<?php if(($wp_query->found_posts) > get_option('posts_per_page')) : ?>
				<p><?php echo 'Showing <b>'.get_option('posts_per_page').'</b> of <b>'.$wp_query->found_posts.' results</b> found searching for <b>'.get_search_query().'</b>'; ?></p>
				<?php else : ?>
				<p><?php echo '<b>'.$wp_query->found_posts.' results</b> found searching for: <b>'.get_search_query().'</b>'; ?></p>
				<?php endif; ?>
				<?php get_search_form(); ?>
			</div>
		</div><!--/row-->
	</div><!--/.container-->
</header>
<section class="bg-default">
	<div class="container">
		<?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), '<p class="text-info didyoumean">Did you mean: ', '</p>', 5);}?>
		<?php if ( have_posts() ) : ?>
		<div class="row">
			<div class="col-md-10 col-lg-8">
				<?php 
				while ( have_posts() ) : the_post(); 	
					get_template_part( 'content', 'search' );
				endwhile;
				?>
			</div>
			<div class="col-md-2 col-lg-4 sidebar sidebar-right hidden-sm hidden-xs">
				<?php if(is_active_sidebar('blog-sidebar')) : ?>
					<?php dynamic_sidebar('blog-sidebar'); ?>
				<?php else : ?>
					<div class="widget">
						<h4 class="widget-title">No Widgets</h4>
						<p>There don't appear to be any widgets used in the <b>Blog Sidebar</b> widget area.</p>
						<p>You should probably add some.</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php else : ?>
		<div class="alert alert-warning margin-bottom" role="alert">
			<p><?php  _e('Sorry, but we looked high and low and couldn\'t find anything releated to that search.  Please try again.', 'bootplate'); ?></p>
		</div>
		<?php endif; //no posts found ?>
		<?php if($wp_query->found_posts > get_option('posts_per_page')): ?>
		<div class="row margin-top">
			<div class="col-md-8 col-lg-6 wp-pagination">
				<?php
				//global $wp_query;
				$big = 999999999; // need an unlikely integer
				
				echo bootplate_paginate_links( array(
					'base'					=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format'				=> '?paged=%#%',
					'current'				=> max( 1, get_query_var('paged') ),
					'prev_next' 			=> true,
					'prev_text' 			=> __('<span class="bp-left-open"></span>', 'bootplate'),
					'next_text' 			=> __('<span class="bp-right-open"></span>', 'bootplate'),
					'type' 					=> 'list',
					'total' 				=> $wp_query->max_num_pages,
					'before_page_number' 	=> '<span class="sr-only screen-reader-text">'.__('Page', 'bootplate').' </span>'
				) );
				?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
