<?php
/*
 * The Default Page Template
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<header class="jumbotron jumbotron-fluid bg-custom">
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
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
