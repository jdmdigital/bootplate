<?php if(is_single()) : ?>
<article class="post-content col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 <?php echo get_post_format(); ?>">
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
		<p class="post-meta"><?php _e('By', 'bootplate'); ?> <?php the_author_posts_link(); ?> <?php _e('last updated', 'bootplate'); ?> <?php the_modified_date(); ?> <?php _e('in', 'bootplate'); ?> <?php the_category(', '); ?></p>
	</article>
</div>
<?php endwhile; ?>

<?php if($wp_query->found_posts > get_option('posts_per_page')): ?>
<div class="margin-top">
	<div class="col-lg-12 wp-pagination">
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bootplate' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="sr-only screen-reader-text">' . __( 'Page', 'bootplate' ) . ' </span>%',
			'separator'   => '<span class="sr-only screen-reader-text">, </span>',
		) );
		?>
	</div>
</div>
<?php endif; ?>

<?php endif; ?>