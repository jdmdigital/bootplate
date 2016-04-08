<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="jumbotron jumbotron-fluid bg-custom">
	<div class="container">
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
		<?php 
			if(is_author()) : 
    			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); // current author info
		?>
		<ul class="list-unstyled author-info post-meta">
        	<?php if($curauth->ID != '') : ?>				<li><span class="bp-rss margin-right"></span> <b><?php echo count_user_posts($curauth->ID); ?></b> Posts</li>							<?php endif; ?>
			<?php if($curauth->user_url != '') : ?>			<li><span class="bp-link margin-right"></span> <a href="<?php echo $curauth->user_url; ?>" target="_blank" rel="nofollow"><?php echo $curauth->user_url; ?></a></li>	<?php endif; ?>
        	<?php if(get_the_author_meta('twitter')) : ?>	<li><span class="bp-twitter margin-right"></span> <a href="https://twitter.com/<?php the_author_meta('twitter') ?>" target="_blank" rel="nofollow">@<?php the_author_meta('twitter') ?></a></li>	<?php endif; ?>
			<?php if(get_the_author_meta('googleplus')) : ?><li><span class="bp-gplus margin-right"></span> <a href="<?php the_author_meta('googleplus') ?>" target="_blank" rel="nofollow"><?php the_author_meta('googleplus') ?></a></li>	<?php endif; ?>
			<?php if(get_the_author_meta('facebook')) : ?>	<li><span class="bp-facebook margin-right"></span> <a href="<?php the_author_meta('facebook') ?>" target="_blank" rel="nofollow"><?php the_author_meta('facebook') ?></a></li>	<?php endif; ?>
			<?php if($curauth->user_description != '') : ?>	<li><span class="bp-heart margin-right"></span> <b>Bio:</b> <?php echo $curauth->user_description; ?></li>								<?php endif; ?>
    	</ul>
		<?php else : ?>
		<?php the_archive_description( '<p>', '</p>' ); ?>
		<?php endif; ?>
	</div><!--/.container-->
</header>

<section>
	<div class="container">
		<div class="row margin-bottom archive <?php echo get_post_format(); ?>">
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div>
	</div>
</section>

<?php else : ?>

<?php get_template_part( 'content', 'none' ); ?>

<?php endif; //have posts ?>

<?php get_footer(); ?>
