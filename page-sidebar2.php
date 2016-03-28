<?php
/*
 * Template Name: Page: Both Sidebars
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<header class="<?php echo header_classes(); ?>">
	<div class="container">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php if(have_bootplate_subtitle()) { bootplate_subtitle(); } ?>
		<?php 
		if(have_bootplate_btns()) : 
			if(have_cta1() && have_cta2()) :
		?>
		<div class="row margin-top">
			<div class="col-sm-6">
				<?php the_cta(1); ?>
			</div>
			<div class="col-sm-6">
				<?php the_cta(2); ?>
			</div>
		</div>
		
		<?php 
			elseif(have_cta1() && !have_cta2()) :
		?>
		<div class="row margin-top">
			<div class="col-sm-12">
				<?php the_cta(1); ?>
			</div>
		</div>
		
		<?php
			endif; // end which buttons?
		endif; // end have_btns
		?>
	</div><!--/.container-->
</header>

<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			
			<div class="col-lg-2 hidden-md sidebar sidebar-left">
			<?php if(is_active_sidebar('page-sidebar-left')) : ?>
				<?php dynamic_sidebar('page-sidebar-left'); ?>
			<?php else : ?>
				<div class="widget">
					<h4 class="widget-title">No Left Widgets</h4>
					<p>Sorry, but there don't appear to be any widgets used in the <b>Page Sidebar Left</b> widget area.</p>
					<p>You could add some or select a page template that doesn't use a sidebar.</p>
				</div>
			<?php endif; ?>
			</div>
			
			<div class="col-lg-8 main-content">
				<?php the_content(); ?>
			</div>
			
			<div class="col-lg-2 hidden-md sidebar sidebar-right">
			<?php if(is_active_sidebar('page-sidebar-right')) : ?>
				<?php dynamic_sidebar('page-sidebar-right'); ?>
			<?php else : ?>
				<div class="widget">
					<h4 class="widget-title">No Right Widgets</h4>
					<p>Sorry, but there don't appear to be any widgets used in the <b>Page Sidebar Right</b> widget area.</p>
					<p>You could add some or select a page template that doesn't use a sidebar.</p>
				</div>
			<?php endif; ?>
			</div>
			
		</div><!--/row-->
	</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
