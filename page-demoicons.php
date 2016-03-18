<?php
/*
Template Name: Page: Demo Icons
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

<section id="icon-ref">
	<div class="container">
		<h2>Reference</h2>
		<p>There is a custom set of <strong class="text-primary">52 font icons</strong> included in <?php bloginfo('name'); ?> v<?php echo bootplate_info('version'); ?>.  Here's what they all look like as well as the class name you would add to a SPAN statement or whatever.  Toggle the codes checkbox below if you're doing something fancy in CSS/JS.  Otherwise, this is a handy page for your reference.</p>
		<p>A lot of people like to use something like <code>&lt;i class=&quot;bp-whatever&quot;&gt;&lt;/i&gt;</code>, but we don't like that. <code>&lt;i&gt;</code> is supposed to be for italics&mdash;not Icons.  To be symatic, we prefer to just use <code>&lt;span class=&quot;bp-whatever&quot;&gt;&lt;/span&gt;</code>. Either works. We're just saying.</p>
		<div class="checkbox">
			<label class="switch">
        		<input type="checkbox" onclick="toggleCodes(this.checked)"> show codes
			</label>
	  	</div>
		<div id="icondemo" class="margin-bottom">
			<div class="row">
				<div title="Code: 0xe800" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-heart"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-heart" /></span>
					<span class="i-code">0xe800</span>
				</div>
				<div title="Code: 0xe801" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-heart-empty"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-heart-empty" /></span>
					<span class="i-code">0xe801</span>
				</div>
				<div title="Code: 0xe801" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-ok"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-ok" /></span>
					<span class="i-code">0xe801</span>
				</div>
				<div title="Code: 0xe803" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-cancel"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-cancel" /></span>
					<span class="i-code">0xe803</span>
				</div>				
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe804" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-info"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-info" /></span>
					<span class="i-code">0xe804</span>
				</div>
				<div title="Code: 0xe805" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-help"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-help" /></span>
					<span class="i-code">0xe805</span>
				</div>
				<div title="Code: 0xe805" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-download"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-download" /></span>
					<span class="i-code">0xe805</span>
				</div>
				<div title="Code: 0xe807" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-download-cloud"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-download-cloud" /></span>
					<span class="i-code">0xe807</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe808" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-share"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-share" /></span>
					<span class="i-code">0xe808</span>
				</div>
				<div title="Code: 0xe809" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-location"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-location" /></span>
					<span class="i-code">0xe809</span>
				</div>
				<div title="Code: 0xe80a" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-attention-alt"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-attention-alt" /></span>
					<span class="i-code">0xe80a</span>
				</div>
				<div title="Code: 0xe80b" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-down-open"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-down-open" /></span>
					<span class="i-code">0xe80b</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe80c" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-left-open"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-left-open" /></span>
					<span class="i-code">0xe80c</span>
				</div>
				<div title="Code: 0xe80d" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-right-open"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-right-open" /></span>
					<span class="i-code">0xe80d</span>
				</div>
				<div title="Code: 0xe80e" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-up-open"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-up-open" /></span>
					<span class="i-code">0xe80e</span>
				</div>
				<div title="Code: 0xe80f" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-paper-plane"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-paper-plane" /></span>
					<span class="i-code">0xe80f</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe810" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-rocket"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-rocket" /></span>
					<span class="i-code">0xe810</span>
				</div>
				<div title="Code: 0xe811" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-off"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-off" /></span>
					<span class="i-code">0xe811</span>
				</div>
				<div title="Code: 0xe812" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-lifebuoy"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-lifebuoy" /></span>
					<span class="i-code">0xe812</span>
				</div>
				<div title="Code: 0xe813" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-trash"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-trash" /></span>
					<span class="i-code">0xe813</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe814" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-attention"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-attention" /></span>
					<span class="i-code">0xe814</span>
				</div>
				<div title="Code: 0xe815" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-mail"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-mail" /></span>
					<span class="i-code">0xe815</span>
				</div>
				<div title="Code: 0xe816" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-paypal"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-paypal" /></span>
					<span class="i-code">0xe816</span>
				</div>
				<div title="Code: 0xe817" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-gplus"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-gplus" /></span>
					<span class="i-code">0xe817</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe818" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-pinterest"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-pinterest" /></span>
					<span class="i-code">0xe818</span>
				</div>
				<div title="Code: 0xe819" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-call"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-call" /></span>
					<span class="i-code">0xe819</span>
				</div>
				<div title="Code: 0xe81a" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-dribbble"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-dribbble" /></span>
					<span class="i-code">0xe81a</span>
				</div>
				<div title="Code: 0xe81b" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-email"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-email" /></span>
					<span class="i-code">0xe81b</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe81c" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-vimeo"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-vimeo" /></span>
					<span class="i-code">0xe81c</span>
				</div>
				<div title="Code: 0xe81d" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-youtube"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-youtube" /></span>
					<span class="i-code">0xe81d</span>
				</div>
				<div title="Code: 0xe81e" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-twitter"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-twitter" /></span>
					<span class="i-code">0xe81e</span>
				</div>
				<div title="Code: 0xe81f" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-rss"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-rss" /></span>
					<span class="i-code">0xe81f</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe820" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-skype"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-skype" /></span>
					<span class="i-code">0xe820</span>
				</div>
				<div title="Code: 0xe821" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-linkedin"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-linkedin" /></span>
					<span class="i-code">0xe821</span>
				</div>
				<div title="Code: 0xe822" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-github-circled"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-github-circled" /></span>
					<span class="i-code">0xe822</span>
				</div>
				<div title="Code: 0xe823" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-WordPress"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-WordPress" /></span>
					<span class="i-code">0xe823</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe824" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-facebook"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-facebook" /></span>
					<span class="i-code">0xe824</span>
				</div>
				<div title="Code: 0xe825" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-vimeo-1"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-vimeo-1" /></span>
					<span class="i-code">0xe825</span>
				</div>
				<div title="Code: 0xe826" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-instagram-filled"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-instagram-filled" /></span>
					<span class="i-code">0xe826</span>
				</div>
				<div title="Code: 0xe827" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-github"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-github" /></span>
					<span class="i-code">0xe827</span>
				</div>								
			</div><!--/row-->
			<div class="row">
				<div title="Code: 0xe828" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-search"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-search" /></span>
					<span class="i-code">0xe828</span>
				</div>
				<div title="Code: 0xe829" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-logout"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-logout" /></span>
					<span class="i-code">0xe829</span>
				</div>
				<div title="Code: 0xe82a" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-lock"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-lock" /></span>
					<span class="i-code">0xe82a</span>
				</div>
				<div title="Code: 0xe82b" class="col-sm-6 col-md-3 the-icons">
					<i class="demo-icon bp-link"></i> 
					<span class="i-name"><input type="text" class="form-control" readonly value=".bp-link" /></span>
					<span class="i-code">0xe82b</span>
				</div>								
			</div><!--/row-->		
		</div><!--/#icondemo-->
		<p>Download the <a href="<?php echo get_template_directory_uri(); ?>/fontello-config.zip">Fontello config file</a> here.</p>
	</div>
</section>

<?php get_footer(); ?>
