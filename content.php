<?php if(is_single()) : ?>
<article class="post-content col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 <?php echo get_post_format(); ?>">
	<?php the_featured_image(); ?>
	<?php the_content(); ?>
	<div class="row margint-top">
		<div class="col-lg-12">
			<ul class="pager">
				<li class="pager-prev"><?php previous_post_link	( '%link', __('Previous Article', 'bootplate'), $in_same_term = true, '', $taxonomy = 'category' ); ?></li>
				<li class="pager-next"><?php next_post_link		( '%link', __('Next Article', 'bootplate'), $in_same_term = true, '', $taxonomy = 'category' ); ?></li>
			</ul>
		</div>
	</div>
</article>
<?php else : ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="col-sm-6 col-lg-4">
	<article class="post <?php echo get_post_format(); ?>">
		<?php the_title( sprintf( '<h2 class="h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="the-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<p class="post-meta"><?php _e('By', 'bootplate'); ?> <?php the_author_posts_link(); ?> <?php _e('posted', 'bootplate'); ?> <a href="<?php echo get_month_link(the_date('Y'), the_date('m')); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a> <?php _e('in', 'bootplate'); ?> <?php the_category(', '); ?></p>
	</article>
</div>
<?php endwhile; ?>

<?php if($wp_query->found_posts > get_option('posts_per_page')): ?>
<div class="margin-top">
	<div class="col-lg-12 wp-pagination">
		<?php
		global $wp_query;
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
			'before_page_number' 	=> '<span class="sr-only screen-reader-text">'.__('Page', 'bootplate').'</span>'
		) );
		?>
	</div>
</div>
<?php endif; ?>

<?php endif; ?>