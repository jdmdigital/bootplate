<?php if(is_single()) : ?>
<article class="post-content col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
	<?php the_content(); ?>
	<div class="row margint-top">
		<div class="col-lg-12">
			<ul class="pager">
				<li class="pager-prev"><?php previous_post_link	( '%link', 'Previous Article', $in_same_term = true, '', $taxonomy = 'category' ); ?></li>
				<li class="pager-next"><?php next_post_link		( '%link', 'Next Article', $in_same_term = true, '', $taxonomy = 'category' ); ?></li>
			</ul>
		</div>
	</div>
</article>
<?php else : ?>
<div class="col-sm-6 col-lg-4">
	<article class="post">
		<?php the_title( sprintf( '<h2 class="h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php the_excerpt(); ?>
		<p class="post-meta">By <?php the_author_link(); ?> last updated <a href="<?php echo get_month_link(the_date('Y'), the_date('m')); ?>"><?php the_modified_date(); ?></a> in <?php the_category(', '); ?></p>
	</article>
</div>
<?php endif; ?>